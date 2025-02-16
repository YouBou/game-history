<?php

namespace App\Adapter\Converter;

use App\Service\UsecaseInput\SearchGameInput;
use Illuminate\Http\Request;

class SearchGameConverter implements SearchGameInput
{
    private string $keyword;

    public function __construct(
        Request $request,
    ) {
        $this->keyword = $request->input('keyword');
    }

    public function getKeyword(): string
    {
        return $this->keyword;
    }
}