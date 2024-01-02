<?php

declare(strict_types=1);

namespace App\Domain\Game;

use AllowDynamicProperties;

#[AllowDynamicProperties] class Game
{

    public function __construct(private string $name, private string $company, private string $platform)
    {
    }

    private function name(): string
    {
        return $this->name;
    }

    private function company(): string
    {
        return $this->company;
    }

    private function platform(): string
    {
        return $this->platform;
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name(),
            'company' => $this->company(),
            'platform' => $this->platform()
        ];
    }
}