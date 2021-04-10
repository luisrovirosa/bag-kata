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
    protected int $capacity;

    protected function __construct(?string $category, int $capacity)
    {
        $this->items = [];
        $this->category = $category;
        $this->capacity = $capacity;
    }

    public static function newBackpack(): Bag
    {
        return new BackPack();
    }

    public static function categoryBag(string $category): Bag
    {
        return new self($category, 4);
    }

    public static function genericBag(): Bag
    {
        return new self(null, 4);
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
        return count($this->items()) >= $this->capacity;
    }

    public function isPreferredItem(string $item): bool
    {
        return $this->itemCategory[$item] === $this->category;
    }
}