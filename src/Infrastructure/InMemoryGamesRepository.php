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
        $games = [
            1 => ['title' => 'Hogwarts Legacy', 'company' => 'Avalanche Software', 'platform' => 'PS5'],
            2 => ['title' => 'God of War 2018', 'company' => 'Santa Monica Studios', 'platform' => 'PS5']
        ];

        return GameCollection::buildFromRaw($games);
    }
}
