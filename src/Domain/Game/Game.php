<?php

declare(strict_types=1);

namespace App\Domain\Game;

use AllowDynamicProperties;
use App\Domain\ValueObjects\Title;

#[AllowDynamicProperties] class Game
{

    public function __construct(private Title $title, private string $company, private string $platform)
    {
    }

    private function title(): Title
    {
        return $this->title;
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
            'title' => $this->title()->value(),
            'company' => $this->company(),
            'platform' => $this->platform()
        ];
    }
}