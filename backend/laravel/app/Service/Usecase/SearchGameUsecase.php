<?php

namespace App\Service\Usecase;

use App\Domain\Model\Game\CoverUrl;
use App\Domain\Model\Game\Game;
use App\Domain\Model\Game\GameId;
use App\Domain\Model\Game\GameName;
use App\Service\UsecaseInput\SearchGameInput;
use App\Service\UsecaseOutput\SearchGameOutput;
use App\Service\UsecaseOutputImpl\SearchGameOutputImpl;
use Illuminate\Support\Facades\Http;

class SearchGameUsecase
{
    public function execute(SearchGameInput $input): SearchGameOutput
    {
        $keyword = $input->getKeyword()->value();
        $query = 'search "' . $keyword . '";fields name,game_localizations.region,game_localizations.cover.url,game_localizations.name;limit 10;';

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'Client-ID' => config('services.igdb.clientId'),
            'Accept' => 'application/json',
        ])
        ->withToken(config('services.igdb.accessToken'))
        ->withBody($query, 'text/plain')
        ->post('https://api.igdb.com/v4/games');

        $filteredGames = array_values(
            array_filter($response->json(), static function (array $data) {
                return isset($data['game_localizations'][0]['region']) && $data['game_localizations'][0]['region'] === 3;
            })
        );

        $games = array_map(static function (array $data) {
            $jpName = '';
            $coverUrl = '';

            foreach ($data['game_localizations'] as $gameLocalization) {
                if ($gameLocalization['region'] === 3) {
                    $jpName = $gameLocalization['name'];
                    $coverUrl = isset($gameLocalization['cover']['url']) ? $gameLocalization['cover']['url'] : '';
                    break;
                }
            }

            return new Game(
                gameId: new GameId($data['id']),
                gameName: new GameName($jpName),
                coverUrl: new CoverUrl($coverUrl),
            );
        }, $filteredGames);
        
        return new SearchGameOutputImpl(games: $games);  
    }
}