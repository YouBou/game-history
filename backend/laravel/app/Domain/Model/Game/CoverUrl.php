<?php

namespace App\Domain\Model\Game;

class CoverUrl
{
    public function __construct(
        private readonly string $value
    ) {
    }

    public function value(): string
    {
        return $this->value;
    }
}