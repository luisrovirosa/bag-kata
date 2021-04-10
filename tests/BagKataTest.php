<?php

namespace BagKata\Test;

use BagKata\BagKata;
use PHPUnit\Framework\TestCase;

class BagKataTest extends TestCase
{
    /** @test */
    public function items_can_be_added(): void
    {
        $bagKata = new BagKata();

        $bagKata->add('Leather');

        self::assertEquals(['Leather'], $bagKata->backpack());
    }
}