<?php

namespace App\Service\UsecaseOutputImpl;

use App\Service\UsecaseOutput\GetHogeUsecaseOutput;

class GetHogeUsecaseOutputImpl implements GetHogeUsecaseOutput
{
    public function __construct(
        private readonly string $message
    ) {
    }

    public function getMessage(): string
    {
        return $this->message;
    }
}