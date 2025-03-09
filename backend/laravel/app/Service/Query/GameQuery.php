<?php

namespace App\Service\Query;

use App\Domain\Model\Game\Game;

interface GameQuery
{
    /**
     * @param string $keyword
     * @return Game[]
     */
    public function search(string $keyword): array;
}