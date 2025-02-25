<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\GetGameInput;
use App\Service\UsecaseOutput\GetGameOutput;
use App\Service\UsecaseOutputImpl\GetGameOutputImpl;
use Illuminate\Support\Facades\Http;

class GetGameUsecase
{
    public function execute(GetGameInput $input): GetGameOutput
    {
        $gameId = (string)$input->getId()->value();
        $query = <<<APICALYPSE
        where id = {$gameId};
        fields 
            id,
            name,
            summary,
            storyline,
            rating,
            rating_count,
            first_release_date,
            cover.url,
            cover.image_id,
            screenshots.image_id,
            involved_companies.company.name,
            involved_companies.developer,
            involved_companies.publisher,
            genres.name,
            platforms.name,
            game_localizations.name,
            game_localizations.region;
        APICALYPSE;

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'Client-ID' => config('services.igdb.clientId'),
            'Accept' => 'application/json',
        ])
        ->withToken(config('services.igdb.accessToken'))
        ->withBody($query, 'text/plain')
        ->post('https://api.igdb.com/v4/games');

        $game = $response->json()[0];

        return new GetGameOutputImpl($game);
    }
}