<?php

declare(strict_types = 1);

namespace BagKata;

class BackPack extends Bag
{
    public function __construct()
    {
        parent::__construct(null, 8);
    }
}