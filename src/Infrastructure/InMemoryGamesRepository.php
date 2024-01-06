<?php

declare(strict_types=1);

namespace App\Infrastructure;

use App\Domain\Game\Game;
use App\Domain\Game\GameCollection;
use App\Domain\Game\GetGamesRepositoryInterface;

class InMemoryGamesRepository implements GetGamesRepositoryInterface
{
    private const ITEMS_PER_PAGE = 3;
    public function getAllGames(?int $page = 1): array
    {
        $games = [
            1 => ['title' => 'Hogwarts Legacy', 'company' => 'Avalanche Software', 'platform' => 'PS5'],
            2 => ['title' => 'God of War 2018', 'company' => 'Santa Monica Studios', 'platform' => 'PS5'],
            3 => ['title' => 'Death Stranding', 'company' => 'Kojima Productions', 'platform' => 'PS5'],
            4 => ['title' => 'Star Wars: Jedi Fallen Order', 'company' => 'Electronic Arts', 'platform' => 'PS5'],
            5 => ['title' => 'Assassins Creed: Mirage', 'company' => 'Ubisoft', 'platform' => 'PS5'],
            6 => ['title' => 'Far Cry 6', 'company' => 'Ubisoft', 'platform' => 'PS5'],
            7 => ['title' => 'Sackboy: Una aventura a lo grande', 'company' => 'Sony Studios', 'platform' => 'PS5'],
            8 => ['title' => 'Ratchet & Clank: Una dimension aparte', 'company' => 'Insomniac', 'platform' => 'PS5'],
            9 => ['title' => "Demon's Soul", 'company' => 'BluePoints', 'platform' => 'PS5'],
            10 => ['title' => 'Spider-Man: Miles Morales', 'company' => 'Insomniac', 'platform' => 'PS5'],
            11 => ['title' => 'Kena: Bridge of Spirits', 'company' => 'Ember Lab', 'platform' => 'PS5'],
            12 => ['title' => 'Horizon: Forbidden West', 'company' => 'Guerrilla', 'platform' => 'PS5'],
            13 => ['title' => 'The Last Of Us I', 'company' => 'Naughty Dog', 'platform' => 'PS5']
        ];

        $startIndex = ($page - 1) * self::ITEMS_PER_PAGE;

        $pagedGames = array_slice($games, $startIndex, self::ITEMS_PER_PAGE, true);

        if (empty($pagedGames)) {
            return ['message' => 'No hay más resultados disponibles.'];
        }
        return GameCollection::buildFromRaw($pagedGames);
    }
}
