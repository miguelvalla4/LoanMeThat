<?php

declare(strict_types=1);

namespace App\Infrastructure\Actions\Game;

use App\Application\UseCase\Games\GetAllGamesUseCase;
use App\Infrastructure\Actions\Action;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class GamesAction extends Action
{
    public function __construct(private readonly GetAllGamesUseCase $useCase, LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    protected function action(): ResponseInterface
    {
        $response = $this->useCase->execute((int)$_GET['page']);

        return $this->respondWithData(
            [
                "games" => $response
            ]
        );
    }
}
