<?php

namespace BagKata\Test;

use BagKata\BagKata;
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

        self::assertEquals([$item], $bagKata->backpack());
    }

    public function validItems(): array
    {
        return [
            ['Leather'],
            ['Linen']
        ];
    }

    /** @test */
    public function more_than_one_item_can_be_added(): void
    {
        $bagKata = new BagKata();

        $bagKata->add('Leather');
        $bagKata->add('Axe');

        self::assertEquals(['Leather', 'Axe'], $bagKata->backpack());
    }

    /** @test */
    public function items_are_ordered_alphabetically_inside_the_bag_when_the_spell_is_casted(): void
    {
        $bagKata = new BagKata();
        $bagKata->add('Leather');
        $bagKata->add('Axe');

        $bagKata->organize();

        self::assertEquals(['Axe', 'Leather'], $bagKata->backpack());
    }
}