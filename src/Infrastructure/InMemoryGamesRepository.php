<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Game\Game;
use App\Domain\Game\GameCollection;
use App\Domain\Game\GetGamesRepositoryInterface;

class InMemoryGamesRepository implements GetGamesRepositoryInterface
{
    public function getAllGames(): array
    {
        //todo jugar con GamesCollection
        $game = ['name' => 'Hogwarts Legacy', 'company' => 'Avalanche Software', 'platform' => 'PS5'];
        $game2 = ['name' => 'God of War 2018', 'company' => 'Santa Monica Studios', 'platform' => 'PS5'];

        return GameCollection::createFromRawData($game, $game2);
    }
}
