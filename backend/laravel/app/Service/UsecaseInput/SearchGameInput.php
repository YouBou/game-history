<?php

namespace App\Service\UsecaseInput;

interface SearchGameInput
{
    public function getKeyword(): string;
}