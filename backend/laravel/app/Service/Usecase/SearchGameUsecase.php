<?php

namespace App\Service\Usecase;

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
        $query = "search \"{$keyword}\"; fields name; limit 10;";

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'Client-ID' => config('services.igdb.clientId'),
            'Accept' => 'application/json',
        ])
        ->withToken(config('services.igdb.accessToken'))
        ->withBody($query, 'text/plain')
        ->post('https://api.igdb.com/v4/games');

        $games = array_map(static function (array $data) {
            return new Game(
                gameId: new GameId($data['id']),
                gameName: new GameName($data['name']),
            );
        }, $response->json());
        
        return new SearchGameOutputImpl(games: $games);  
    }
}