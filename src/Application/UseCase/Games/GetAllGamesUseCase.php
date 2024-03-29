<?php

declare(strict_types=1);

namespace App\Application\UseCase\Games;

use App\Domain\Game\GetGamesRepositoryInterface;

readonly class GetAllGamesUseCase
{
    public function __construct(private GetGamesRepositoryInterface $gamesRepository)
    {
    }

    public function execute(?int $page = 1): array
    {
        return $this->gamesRepository->getAllGames($page);
    }
}
