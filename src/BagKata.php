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
        $this->addItem($item, fn (string $item) => $this->findNotFullBag());
    }

    public function organize(): void
    {
        $items = $this->clearBags();
        sort($items);
        $this->addAllInPlace($items);
    }

    public function backpackItems(): array
    {
        return $this->bags[0]->items();
    }

    private function addAllInPlace(array $items): void
    {
        array_walk($items, fn ($item) => $this->addItem($item, fn (string $item) => $this->findBag($item)));
    }

    private function addItem(string $item, \Closure $findMethod): void
    {
        $bag = $findMethod($item);
        if (!$bag) {
            throw new FullBackException();
        }

        $bag->add($item);
    }

    private function findBag(string $item): ?Bag
    {
        return $this->findCategoryBag($item) ?? $this->findNotFullBag();
    }

    private function findCategoryBag(string $item): ?Bag
    {
        foreach ($this->bags as $bag) {
            if ($bag->isPreferredItem($item) && !$bag->isFull()) {
                return $bag;
            }
        }

        return null;
    }

    private function findNotFullBag(): ?Bag
    {
        foreach ($this->bags as $bag) {
            if (!$bag->isFull()) {
                return $bag;
            }
        }

        return null;
    }

    private function clearBags(): array
    {
        return array_merge(...array_map(fn (Bag $bag): array => $bag->empty(), $this->bags));
    }
}