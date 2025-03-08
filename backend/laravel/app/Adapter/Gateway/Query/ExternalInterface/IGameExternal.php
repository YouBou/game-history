<?php

namespace App\Adapter\Gateway\Query\ExternalInterface;

interface IGameExternal
{
    public function search(string $keyword): array;
}