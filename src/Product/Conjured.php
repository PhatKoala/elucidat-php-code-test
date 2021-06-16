<?php

declare(strict_types=1);

namespace App\Product;

class Conjured extends AbstractProduct
{
    /**
     * "Conjured" items degrade in Quality twice as fast as normal items
     *
     * @inheritdoc
     */
    public const QUALITY_INCREMENTS = -2;
}