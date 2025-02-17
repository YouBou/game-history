<?php

namespace App\Adapter\Converter;

use App\Domain\Model\Game\Keyword;
use App\Service\UsecaseInput\SearchGameInput;
use Illuminate\Http\Request;

class SearchGameConverter implements SearchGameInput
{
    private Keyword $keyword;

    public function __construct(
        Request $request,
    ) {
        $this->keyword = new Keyword((string)$request->input('keyword'));
    }

    public function getKeyword(): Keyword
    {
        return $this->keyword;
    }
}