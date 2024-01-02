<?php

declare(strict_types=1);

namespace App\Application\Actions\Game;

use App\Application\Actions\Action;
use App\Application\UseCase\Games\GetAllGamesUseCase;
use Psr\Http\Message\ResponseInterface;
use Psr\Log\LoggerInterface;

class GamesAction extends Action
{
    public function __construct(private readonly GetAllGamesUseCase $gamesUseCase, LoggerInterface $logger)
    {
        parent::__construct($logger);
    }

    protected function action(): ResponseInterface
    {
        $response = $this->useCase->execute();
        return $this->respondWithData([
            'message' => $response,
            'file' => __FILE__
        ]);
    }
}
