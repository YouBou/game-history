<?php

namespace App\Service\UsecaseInput;

use App\Domain\Model\Game\Keyword;

interface SearchGameInput
{
    public function getKeyword(): Keyword;
}