<?php

namespace App\Adapter\Gateway\Query;

use App\Service\Query\GameQuery;
use App\Domain\Model\Game\Game;
use App\Adapter\Gateway\Query\ExternalInterface\IGameExternal;
use App\Adapter\Gateway\Query\Transformer\GameTransformer;

class GameQueryGateway implements GameQuery
{
    public function __construct(
        private readonly IGameExternal $gameExternal,
        private readonly GameTransformer $gameTransformer
    ) {}

    /**
     * @param string $keyword
     * @return Game[]
     */
    public function search(string $keyword): array
    {
        $results = $this->gameExternal->search($keyword);

        return array_map(function (array $result) {
            return $this->gameTransformer->toGame($result);
        }, $results);
    }
}