<?php

namespace App\Adapter\Controller;

use App\Adapter\Converter\GetHogeConverter;
use App\Adapter\Presenter\GetHogePresenter;
use App\Service\Usecase\GetHogeUsecase;
use Illuminate\Http\JsonResponse;

class HogeController extends Controller
{
    public function get(
        GetHogeConverter $input,
        GetHogeUsecase $usecase,
        GetHogePresenter $presenter,
    ): JsonResponse {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }
}
