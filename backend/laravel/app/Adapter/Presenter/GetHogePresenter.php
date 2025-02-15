<?php

namespace App\Adapter\Presenter;

use App\Service\UsecaseOutput\GetHogeUsecaseOutput;
use Illuminate\Http\JsonResponse;

class GetHogePresenter
{
    public function execute(GetHogeUsecaseOutput $output): JsonResponse
    {
        return response()->json(['message' => $output->getMessage()]);
    }
}