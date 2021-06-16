<?php

declare(strict_types=1);

namespace App\Product;

use App\Item;

abstract class AbstractProduct extends Item implements ProductInterface
{
    /**
     * @var integer How much to change the sell in value by each day
     */
    public const SELL_IN_INCREMENTS = -1;

    /**
     * @var integer How much to change the quality value by each day
     */
    public const QUALITY_INCREMENTS = -1;

    /**
     * @var integer At which point does the sell in value cause the quality value to change twice as fast
     */
    public const QUALITY_INCREMENTS_TWICE_AS_FAST = 0;

    /**
     * @var integer The minimum value for the quality
     */
    public const QUALITY_MIN = 0;

    /**
     * @var integer The maximum value for the quality
     */
    public const QUALITY_MAX = 50;

    /**
     * Change the sell in and quality values after each day
     */
    public function nextDay()
    {
        $this->changeSellIn();
        $this->changeQuality();
    }

    /**
     * Change the sell in value for the product
     */
    protected function changeSellIn()
    {
        $this->sellIn += static::SELL_IN_INCREMENTS;
    }

    /**
     * Change the quality in value for the product
     */
    protected function changeQuality()
    {
        $this->quality += static::QUALITY_INCREMENTS;

        // Once the sell by date has passed, Quality degrades twice as fast
        if ($this->sellIn < static::QUALITY_INCREMENTS_TWICE_AS_FAST) {
            $this->quality += static::QUALITY_INCREMENTS;
        }

        // The Quality of an item is never negative
        if ($this->quality < static::QUALITY_MIN) {
            $this->quality = static::QUALITY_MIN;
        }

        // The Quality of an item is never more than 50
        if ($this->quality > static::QUALITY_MAX) {
            $this->quality = static::QUALITY_MAX;
        }
    }
}