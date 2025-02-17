<?php

namespace App\Domain\Share\ValueObject;

use Exception;

/**
 * ID値
 */
class Id
{
    public function __construct(
        private readonly int $id
    ) {
        if (!is_numeric($id)) {
            throw new Exception(static::class . "must be a number");
        }
    }

    public function value(): int
    {
        return $this->id;
    }
}