<?php

declare(strict_types = 1);

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class Bag
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
        array_walk($items, fn ($item) => $this->add($item));
    }

    #[Pure]
    public function isFull(): bool
    {
        return count($this->items()) >= 8;
    }
}