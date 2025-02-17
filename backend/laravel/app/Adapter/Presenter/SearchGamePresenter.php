<?php

namespace App\Adapter\Presenter;

use App\Domain\Model\Game\Game;
use App\Service\UsecaseOutput\SearchGameOutput;
use Illuminate\Http\JsonResponse;

class SearchGamePresenter
{
    public function execute(SearchGameOutput $output): JsonResponse
    {
        return response()->json(
            array_map(static function (Game $game) {
                return [
                    'gameId' => $game->gameId()->value(),
                    'gameName' => $game->gameName()->value(),
                ];
            }, $output->getGames())
        );
    }
}