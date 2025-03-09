<?php

namespace App\Service\Usecase;

use App\Service\Query\GameQuery;
use App\Service\UsecaseInput\SearchGameInput;
use App\Service\UsecaseOutput\SearchGameOutput;
use App\Service\UsecaseOutputImpl\SearchGameOutputImpl;

class SearchGameUsecase
{
    public function __construct(
        private readonly GameQuery $gameQuery,
    ) {}

    public function execute(SearchGameInput $input): SearchGameOutput
    {
        $keyword = $input->getKeyword()->value();
        $games = $this->gameQuery->search($keyword);
        
        return new SearchGameOutputImpl(games: $games);  
    }
}