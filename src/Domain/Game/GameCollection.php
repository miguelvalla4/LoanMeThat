<?php

namespace App\Domain\Game;

use App\Domain\ValueObjects\Title;

class GameCollection
{
    public static function buildFromRaw(array $gamesRaw): array
    {
        $gameCollection = [];

        foreach ($gamesRaw as $gameRaw) {
            $game = new Game(new Title($gameRaw['title']), $gameRaw['company'], $gameRaw['platform']);

            $gameCollection[] = $game->toArray();
        }

        return $gameCollection;
    }
}
