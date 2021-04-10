<?php

namespace BagKata;

class BagKata
{
    /** @var Bag[] */
    private array $bags;

    public function __construct(
        Bag ...$bags
    ) {
        $this->bags = [Bag::newBackpack(), ...$bags];
    }

    public function add(string $item): void
    {
        foreach ($this->bags as $bag) {
            if ($bag->isPreferredItem($item) && !$bag->isFull()) {
                $bag->add($item);

                return;
            }
        }
        foreach ($this->bags as $bag) {
            if (!$bag->isFull()) {
                $bag->add($item);

                return;
            }
        }
        throw new FullBackException();
    }

    public function backpackItems(): array
    {
        return $this->backpack()->items();
    }

    public function organize(): void
    {
        $items = $this->emptyBags();
        sort($items);
        $this->addAll($items);
    }

    private function backpack(): Bag
    {
        return $this->bags[0];
    }

    private function emptyBags(): array
    {
        return array_merge(...array_map(fn (Bag $bag): array => $bag->empty(), $this->bags));
    }

    private function addAll(array $items): void
    {
        array_walk($items, fn ($item) => $this->add($item));
    }
}