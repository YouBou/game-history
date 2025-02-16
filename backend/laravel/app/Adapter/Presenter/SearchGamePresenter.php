<?php

namespace App\Adapter\Presenter;

use App\Service\UsecaseOutput\SearchGameOutput;
use Illuminate\Http\JsonResponse;

class SearchGamePresenter
{
    public function execute(SearchGameOutput $output): JsonResponse
    {
        return response()->json($output->getGames());
    }
}