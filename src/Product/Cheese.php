<?php

declare(strict_types=1);

namespace App\Product;

/**
 * Abstracting the behaviour of "Aged Brie" to apply to all cheeses
 */
class Cheese extends AbstractProduct
{
    /**
     * "Aged Brie" actually increases in Quality the older it gets
     *
     * @inheritdoc
     */
    public const QUALITY_INCREMENTS = 1;
}