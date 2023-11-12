<?php

declare(strict_types=1);

use App\Domain\Game\GetGamesRepositoryInterface;
use App\Infrastructure\InMemoryGamesRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    $containerBuilder->addDefinitions([
        GetGamesRepositoryInterface::class => \DI\autowire(InMemoryGamesRepository::class),
    ]);
};
