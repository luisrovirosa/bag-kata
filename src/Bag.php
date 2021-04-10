<?php

declare(strict_types = 1);

namespace BagKata;

class Bag
{
    private array $items;
    private Category $category;
    protected int $capacity;

    protected function __construct(?string $category, int $capacity)
    {
        $this->items = [];
        $this->category = new Category($category);
        $this->capacity = $capacity;
    }

    public static function newBackpack(): Bag
    {
        return new self(null, 8);
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

    public function isFull(): bool
    {
        return count($this->items()) >= $this->capacity;
    }

    public function isPreferredItem(string $item): bool
    {
        return $this->category->belongsTo($item);
    }
}