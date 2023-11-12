<?php

declare(strict_types=1);

namespace App\Domain\Game;

interface GetGamesRepositoryInterface
{
    public function getAllGames(): array;
}
