<?php

declare(strict_types = 1);

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class Bag
{
    private array $items;
    private ?string $category;
    private array $itemCategory = [
        'Leather' => 'Clothes',
        'Linen' => 'Clothes',
        'Silk' => 'Clothes',
        'Wool' => 'Clothes',
        'Copper' => 'Metals',
        'Gold' => 'Metals',
        'Iron' => 'Metals',
        'Silver' => 'Metals',
        'Axe' => 'Weapons',
        'Dagger' => 'Weapons',
        'Mace' => 'Weapons',
        'Sword' => 'Weapons',
        'Cherry Blossom' => 'Herbs',
        'Marigold' => 'Herbs',
        'Rose' => 'Herbs',
        'Seaweed' => 'Herbs',
    ];

    public function __construct(?string $category)
    {
        $this->items = [];
        $this->category = $category;
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

    #[Pure]
    public function isFull(): bool
    {
        return count($this->items()) >= 4;
    }

    public function isPreferredItem(string $item): bool
    {
        return $this->itemCategory[$item] === $this->category;
    }
}