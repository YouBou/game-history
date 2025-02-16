<?php

namespace App\Service\Usecase;

use App\Service\UsecaseInput\GetHogeUsecaseInput;
use App\Service\UsecaseOutput\GetHogeUsecaseOutput;
use App\Service\UsecaseOutputImpl\GetHogeUsecaseOutputImpl;

class GetHogeUsecase
{
    public function execute(GetHogeUsecaseInput $input): GetHogeUsecaseOutput
    {
        return new GetHogeUsecaseOutputImpl(message: 'Hello, World!');  
    }
}