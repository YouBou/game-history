<?php

namespace App\Domain\Share\ValueObject;

use Exception;

/**
 * 空文字を許容しない文字列
 */
class NonEmptyString
{
    public function __construct(
        private readonly string $value
    ) {
        if ($value === '') {
            throw new Exception(static::class . 'cannot be empty');
        }
    }

    public function value(): string
    {
        return $this->value;
    }
}