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
}