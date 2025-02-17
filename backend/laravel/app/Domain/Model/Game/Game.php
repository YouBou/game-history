<?php

namespace App\Domain\Model\Game;

/**
 * ゲーム(エンティティ)
 */
class Game
{
    public function __construct(
        private readonly GameId $gameId,
        private readonly GameName $gameName,
    ) { 
    }

    public function gameId(): GameId
    {
        return $this->gameId;
    }

    public function gameName(): GameName
    {
        return $this->gameName;
    }
}