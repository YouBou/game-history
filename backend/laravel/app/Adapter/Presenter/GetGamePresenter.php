<?php

namespace App\Adapter\Presenter;

use App\Service\UsecaseOutput\GetGameOutput;
use Illuminate\Http\JsonResponse;

class GetGamePresenter
{
    public function execute(GetGameOutput $output): JsonResponse
    {
        return response()->json($output->getGame());
    }
}