<?php

namespace App\Domain\ValueObjects;

use MongoDB\Driver\Exception\InvalidArgumentException;

class Title
{
    public function __construct(private readonly ?string $title = null)
    {
        if ($title === null) {
            throw new InvalidArgumentException();
        }
    }

    public function value(): string
    {
        return $this->title;
    }
}