<?php

namespace App\Infrastructure\ExternalApi\Client;

use Illuminate\Support\Facades\Http;

class IgdbClient
{
    private $client;

    public function __construct()
    {
        $this->client = Http::withHeaders([
            'Content-Type' => 'text/plain',
            'Client-ID' => config('services.igdb.clientId'),
            'Accept' => 'application/json',
        ])
        ->withToken(config('services.igdb.accessToken'));
    }

    public function getGames(string $keyword): array
    {
        $query = 'search "' . $keyword . '";fields name,game_localizations.region,game_localizations.cover.url,game_localizations.name;limit 10;';

        $response = $this->client
            ->withBody($query, 'text/plain')
            ->post('https://api.igdb.com/v4/games');

        return $response->json();
    }
}