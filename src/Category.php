<?php

declare(strict_types = 1);

namespace BagKata;

class Category
{
    private ?string $name;
    private const ITEMS_IN_CATEGORY = [
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

    public function belongsTo(string $item):bool
    {
        return self::ITEMS_IN_CATEGORY[$item] === $this->name;
    }
}