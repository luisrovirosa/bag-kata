<?php

namespace BagKata;

class BagKata
{
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add(string $item): void
    {
        if (count($this->items) >= 8) {
            throw new FullBackException();
        }

        $this->items[] = $item;
    }

    public function backpack(): array
    {
        return $this->items;
    }

    public function organize(): void
    {
        sort($this->items);
    }
}