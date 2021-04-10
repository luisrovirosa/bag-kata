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
        'Axe' => 'Weapons',
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
        return count($this->items()) >= 8;
    }

    public function isPreferredItem(string $item): bool
    {
        return $this->itemCategory[$item] === $this->category;
    }
}