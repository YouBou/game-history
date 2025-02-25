<?php

namespace App\Adapter\Converter;

use App\Domain\Share\ValueObject\Id;
use App\Service\UsecaseInput\GetGameInput;
use Illuminate\Http\Request;

class GetGameConverter implements GetGameInput
{
    private Id $id;

    public function __construct(
        Request $request,
    ) {
        $this->id = new Id((string)$request->route('id'));
    }

    public function getId(): Id
    {
        return $this->id;
    }
}