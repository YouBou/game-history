<?php

namespace App\Service\UsecaseOutputImpl;

use App\Service\UsecaseOutput\SearchGameOutput;
use App\Domain\Model\Game\Game;

class SearchGameOutputImpl implements SearchGameOutput
{
    /**
     * @param Game[] $games
     */
    public function __construct(
        private readonly array $games
    ) {
    }

    /**
     * @return Game[]
     */
    public function getGames(): array
    {
        return $this->games;
    }
}