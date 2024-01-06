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
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/api/games', function (Group $group) {
        $group->get('', GamesAction::class);
    });

    $app->get('/games', function (\Slim\Psr7\Request $request, \Slim\Psr7\Response $response) {
        $filePath = __DIR__ . '/../public/index.html';

        if (file_exists($filePath)) {
            $htmlContent = file_get_contents($filePath);

            $response->getBody()->write($htmlContent);
            return $response->withHeader('Content-Type', 'text/html');
        } else {
            $response->getBody()->write('Archivo HTML no encontrado');
            return $response->withStatus(404);
        }
    });
};
