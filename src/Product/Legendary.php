<?php

declare(strict_types=1);

namespace App\Product;

/**
 * Abstracting the behaviour of "Sulfuras" to apply to all legendary items
 */
class Legendary extends AbstractProduct
{
    /**
     * "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
     *
     * @inheritdoc
     */
    public const SELL_IN_INCREMENTS = 0;

    /**
     * "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
     *
     * @inheritdoc
     */
    public const QUALITY_INCREMENTS = 0;
}