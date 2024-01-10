<?php

declare(strict_types=1);

use App\Infrastructure\Actions\Game\GamesAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!' . PHP_EOL);
        $response->getBody()->write('This is a simple API for games.' . PHP_EOL);
        $response->getBody()->write('You can find info on /games with pagination using "page" query param.' . PHP_EOL);
        return $response;
    });

    $app->group('/api/games', function (Group $group) {
        $group->get('', GamesAction::class);
    });
};
