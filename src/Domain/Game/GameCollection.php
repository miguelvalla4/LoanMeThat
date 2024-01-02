<?php

namespace App\Domain\Game;

class GameCollection
{
    public static function createFromRawData(...$gamesRaw): array
    {
        $gameCollection = [];

        foreach ($gamesRaw as $gameRaw) {
            $game = new Game($gameRaw['name'], $gameRaw['company'], $gameRaw['platform']);

            $gameCollection[] = $game->toArray();
        }

        return $gameCollection;
    }
}
