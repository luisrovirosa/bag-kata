<?php

namespace BagKata;

class BagKata
{
    private Backpack $backpack;

    public function __construct()
    {
        $this->backpack = new Backpack();
    }

    public function add(string $item): void
    {
        if (count($this->backpack->items()) >= 8) {
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