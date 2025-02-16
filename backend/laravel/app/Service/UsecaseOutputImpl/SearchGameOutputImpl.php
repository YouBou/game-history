<?php

namespace App\Service\UsecaseOutputImpl;

use App\Service\UsecaseOutput\SearchGameOutput;

class SearchGameOutputImpl implements SearchGameOutput
{
    public function __construct(
        private readonly array $games
    ) {
    }

    public function getGames(): array
    {
        return $this->games;
    }
}