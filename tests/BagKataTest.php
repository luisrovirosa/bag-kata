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

        self::assertEquals([$item], $bagKata->backpack());
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

        self::assertEquals(['Leather', 'Axe'], $bagKata->backpack());
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
        $bag = new Bag();
        $bagKata = new BagKata($bag);
        for ($i = 0; $i < 8; $i++) {
            $bagKata->add('Leather');
        }

        $bagKata->add('Axe');

        self::assertEquals(['Axe'], $bag->items());
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