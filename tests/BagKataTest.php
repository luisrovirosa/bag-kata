<?php

namespace BagKata\Test;

use BagKata\BagKata;
use PHPUnit\Framework\TestCase;

class BagKataTest extends TestCase
{
    /** @test */
    public function xxx()
    {
        new BagKata();

        self::assertEquals(true, true);
    }
}