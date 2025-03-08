<?php

namespace App\Adapter\Gateway\Query\Transformer;

use App\Domain\Model\Game\CoverUrl;
use App\Domain\Model\Game\Game;
use App\Domain\Model\Game\GameId;
use App\Domain\Model\Game\GameName;

class GameTransformer
{
    public function toGame(array $array): Game
    {
        return new Game(
            gameId: new GameId($array['id']),
            gameName: new GameName($array['name']),
            coverUrl: new CoverUrl('hoge'),
        );
    }
}