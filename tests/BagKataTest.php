<?php

namespace BagKata\Test;

use BagKata\Bag;
use BagKata\BagKata;
use BagKata\FullBackException;
use PHPUnit\Framework\TestCase;

class BagKataTest extends TestCase
{
    /**
     * @test
     * @dataProvider validItems
     */
    public function items_can_be_added(string $item): void
    {
        $bagKata = new BagKata();

        $bagKata->add($item);

        self::assertEquals([$item], $bagKata->backpackItems());
    }

    public function validItems(): array
    {
        return [
            ['Leather'],
            ['Linen'],
        ];
    }

    /** @test */
    public function more_than_one_item_can_be_added(): void
    {
        $bagKata = new BagKata();

        $bagKata->add('Leather');
        $bagKata->add('Axe');

        self::assertEquals(['Leather', 'Axe'], $bagKata->backpackItems());
    }

    /** @test */
    public function backpack_can_have_up_to_8_items(): void
    {
        $bagKata = new BagKata();
        for ($i = 0; $i < 8; $i++) {
            $bagKata->add('Leather');
        }

        $this->expectException(FullBackException::class);

        $bagKata->add('Axe');
    }

    /** @test */
    public function extra_bags_are_filled_when_backpack_is_full(): void
    {
        $bag = Bag::genericBag();
        $bagKata = new BagKata($bag);
        for ($i = 0; $i < 8; $i++) {
            $bagKata->add('Leather');
        }

        $bagKata->add('Axe');

        self::assertEquals(['Axe'], $bag->items());
    }

    /** @test */
    public function items_are_ordered_alphabetically_inside_the_backpack_when_the_spell_is_casted(): void
    {
        $bagKata = new BagKata();
        $bagKata->add('Leather');
        $bagKata->add('Axe');

        $bagKata->organize();

        self::assertEquals(['Axe', 'Leather'], $bagKata->backpackItems());
    }

    /** @test */
    public function items_are_ordered_alphabetically_inside_all_bags_when_the_spell_is_casted(): void
    {
        $bag = Bag::genericBag();
        $bagKata = new BagKata($bag);
        for ($i = 0; $i < 8; $i++) {
            $bagKata->add('Leather');
        }
        $bagKata->add('Axe');

        $bagKata->organize();

        self::assertEquals(['Leather'], $bag->items());
    }

    /**
     * @test
     * @dataProvider itemsAndCategories
     */
    public function items_are_organized_inside_their_category_bag(string $item, string $category): void
    {
        $bag = Bag::categoryBag($category);
        $bagKata = new BagKata($bag);
        $bagKata->add($item);

        $bagKata->organize();

        self::assertEquals([$item], $bag->items());
        self::assertEmpty($bagKata->backpackItems());
    }

    public function itemsAndCategories()
    {
        return [
            ['Leather', 'Clothes'],
            ['Linen', 'Clothes'],
            ['Silk', 'Clothes'],
            ['Wool', 'Clothes'],
            ['Copper', 'Metals'],
            ['Gold', 'Metals'],
            ['Iron', 'Metals'],
            ['Silver', 'Metals'],
            ['Axe', 'Weapons'],
            ['Dagger', 'Weapons'],
            ['Mace', 'Weapons'],
            ['Sword', 'Weapons'],
            ['Cherry Blossom', 'Herbs'],
            ['Marigold', 'Herbs'],
            ['Rose', 'Herbs'],
            ['Seaweed', 'Herbs'],
        ];
    }

    /** @test */
    public function extra_bags_can_contain_up_to_4_items(): void
    {
        $bag = Bag::categoryBag('Metals');
        $bagKata = new BagKata($bag);
        for ($i = 0; $i < 5; $i++) {
            $bagKata->add('Gold');
        }
        self::assertEquals(['Gold', 'Gold', 'Gold','Gold'], $bag->items());
        self::assertEquals(['Gold'], $bagKata->backpackItems());
    }
}