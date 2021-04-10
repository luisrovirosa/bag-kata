<?php

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class BagKata
{
    private array $bags;

    #[Pure]
    public function __construct(
        Bag ...$bags
    ) {
        $this->bags = [new BackPack(), ...$bags];
    }

    public function add(string $item): void
    {
        /** @var Bag $bag */
        foreach ($this->bags as $bag) {
            if (!$bag->isFull()) {
                $bag->add($item);

                return;
            }
        }
        throw new FullBackException();
    }

    public function backpack(): array
    {
        return $this->bags[0]->items();
    }

    public function organize(): void
    {
        $items = $this->bags[0]->empty();
        sort($items);
        $this->bags[0]->fillWith($items);
    }
}