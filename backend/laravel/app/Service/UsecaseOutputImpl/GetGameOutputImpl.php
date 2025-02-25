<?php

namespace App\Service\UsecaseOutputImpl;

use App\Domain\Model\Game\Game;
use App\Service\UsecaseOutput\GetGameOutput;

class GetGameOutputImpl implements GetGameOutput
{
    /**
     * @param array $game
     */
    public function __construct(
        private readonly array $game
    ) {
    }

    public function getGame(): array
    {
        return $this->game;
    }
}