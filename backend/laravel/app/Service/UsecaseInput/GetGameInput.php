<?php

namespace App\Service\UsecaseInput;

use App\Domain\Share\ValueObject\Id;

interface GetGameInput
{
    public function getId(): Id;
}