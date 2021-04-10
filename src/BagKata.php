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
        $this->items[] = $item;
    }

    public function backpack(): array
    {
        return $this->items;
    }
}