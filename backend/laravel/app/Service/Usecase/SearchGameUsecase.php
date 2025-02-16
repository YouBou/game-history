<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\SearchGameInput;
use App\Service\UsecaseOutput\SearchGameOutput;
use App\Service\UsecaseOutputImpl\SearchGameOutputImpl;
use Illuminate\Support\Facades\Http;

class SearchGameUsecase
{
    public function execute(SearchGameInput $input): SearchGameOutput
    {
        $keyword = $input->getKeyword();
        $query = "search \"{$keyword}\"; fields name; limit 10;";

        $response = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'Client-ID' => config('services.igdb.clientId'),
            'Accept' => 'application/json',
        ])
        ->withToken(config('services.igdb.accessToken'))
        ->withBody($query, 'text/plain')
        ->post('https://api.igdb.com/v4/games');

        $games = $response->json();
        
        return new SearchGameOutputImpl(games: $games);  
    }
}