<?php

declare(strict_types = 1);

namespace BagKata;

use JetBrains\PhpStorm\Pure;

class BackPack extends Bag
{
    public function __construct()
    {
        parent::__construct(null);
    }

    #[Pure]
    public function isFull(): bool
    {
        return count($this->items()) >= 8;
    }
}