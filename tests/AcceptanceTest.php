<?php

namespace BagKata\Test;

use BagKata\Bag;
use BagKata\BagKata;
use BagKata\FullBackException;
use PHPUnit\Framework\TestCase;

class AcceptanceTest extends TestCase
{
    /** @test */
    public function the_example_provided_works_as_expected(): void
    {
        $bag = new Bag('Metals');
        $bagKata = new BagKata($bag);
        $bagKata->add('Leather');
        $bagKata->add('Iron');
        $bagKata->add('Copper');
        $bagKata->add('Marigold');
        $bagKata->add('Wool');
        $bagKata->add('Gold');
        $bagKata->add('Silk');
        $bagKata->add('Copper');
        $bagKata->add('Copper');
        $bagKata->add('Cherry Blossom');

        $bagKata->organize();

        self::assertEquals(['Cherry Blossom', 'Iron', 'Leather', 'Marigold', 'Silk', 'Wool'], $bagKata->backpackItems());
        self::assertEquals(['Copper', 'Copper', 'Copper', 'Gold'], $bag->items());
    }
}