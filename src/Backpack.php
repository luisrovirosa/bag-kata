<?php

declare(strict_types = 1);

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class Backpack
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add(string $item): void
    {
        $this->items[] = $item;
    }

    public function items(): array
    {
        return $this->items;
    }

    public function empty(): array
    {
        $items = $this->items;
        $this->items = [];

        return $items;

    }

    public function fillWith(array $items): void
    {
        array_map(fn ($item) => $this->add($item), $items);
    }

    #[Pure]
    public function isFull(): bool
    {
        return count($this->items()) >= 8;
    }
}