<?php

namespace App\Infrastructure\ExternalApi\QueryImpl;

use App\Adapter\Gateway\Query\ExternalInterface\IGameExternal;
use App\Infrastructure\ExternalApi\Client\IgdbClient;

class GameExternalImpl implements IGameExternal
{
    public function __construct(
        private readonly IgdbClient $igdbClient,
    ) {
    }

    public function search(string $keyword): array
    {
        return $this->igdbClient->getGames($keyword);
    }
}