<?php

declare(strict_types = 1);

namespace BagKata;

class Category
{
    private ?string $name;
    private array $itemsInCategory = [
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

    public function __construct(?string $name)
    {
        $this->name = $name;
    }

    public function name(): ?string
    {
        return $this->name;
    }

    public function belongsTo(string $item):bool
    {
        return $this->itemsInCategory[$item] === $this->name();
    }
}