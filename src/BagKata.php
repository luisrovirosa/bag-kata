<?php

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class BagKata
{
    private Backpack $backpack;

    #[Pure]
    public function __construct()
    {
        $this->backpack = new Backpack();
    }

    public function add(string $item): void
    {
        if ($this->backpack->isFull()) {
            throw new FullBackException();
        }
        $this->backpack->add($item);
    }

    public function backpack(): array
    {
        return $this->backpack->items();
    }

    public function organize(): void
    {
        $items = $this->backpack->empty();
        sort($items);
        $this->backpack->fillWith($items);
    }
}