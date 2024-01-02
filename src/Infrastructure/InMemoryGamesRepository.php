<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Game\Game;
use App\Domain\Game\GetGamesRepositoryInterface;

class InMemoryGamesRepository implements GetGamesRepositoryInterface
{
    public function getAllGames(): array
    {
        //todo jugar con GamesCollection
        $game = new Game('Hogwarts Legacy', 'Avalanche Software', 'PS5');

        return $game->toArray();
    }
}
