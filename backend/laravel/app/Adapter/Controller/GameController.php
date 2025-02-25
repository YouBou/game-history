<?php

namespace App\Adapter\Controller;

use App\Adapter\Converter\GetGameConverter;
use App\Adapter\Converter\SearchGameConverter;
use App\Adapter\Presenter\GetGamePresenter;
use App\Adapter\Presenter\SearchGamePresenter;
use App\Service\Usecase\GetGameUsecase;
use App\Service\Usecase\SearchGameUsecase;
use Illuminate\Http\JsonResponse;

class GameController extends Controller
{
    public function search(
        SearchGameConverter $input,
        SearchGameUsecase $usecase,
        SearchGamePresenter $presenter,
    ): JsonResponse {
        $output = $usecase->execute($input);
        return $presenter->execute($output);
    }

    public function get(
        GetGameConverter $id,
        GetGameUsecase $usecase,
        GetGamePresenter $presenter,
    ): JsonResponse {
        $output = $usecase->execute($id);
        return $presenter->execute($output);
    }
}
