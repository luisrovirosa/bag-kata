<?php

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class BagKata
{
    private Bag $backpack;
    private array $bags;

    #[Pure]
    public function __construct(
        Bag ...$bags
    ) {
        $this->backpack = new BackPack();
        $this->bags = $bags;
    }

    public function add(string $item): void
    {
        /** @var Bag $bag */
        foreach ([$this->backpack, ...$this->bags] as $bag) {
            if (!$bag->isFull()) {
                $bag->add($item);

                return;
            }
        }
        throw new FullBackException();
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