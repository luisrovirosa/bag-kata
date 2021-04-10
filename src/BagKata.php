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
        if (count($this->items) < 8) {
            $this->items[] = $item;
        } else {
            throw new FullBackException();
        }
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