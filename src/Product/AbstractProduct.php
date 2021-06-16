<?php

declare(strict_types=1);

namespace App\Product;

use App\Item;

abstract class AbstractProduct extends Item implements ProductInterface
{
    public const QUALITY_INCREMENTS = -1;
    public const QUALITY_INCREMENTS_TWICE_AS_FAST = 0;
    public const QUALITY_MIN = 0;
    public const QUALITY_MAX = 50;

    public function nextDay()
    {
        $this->changeSellIn();
        $this->changeQuality();
    }

    private function changeSellIn()
    {
        $this->sellIn--;
    }

    private function changeQuality()
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