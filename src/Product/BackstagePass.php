<?php


namespace App\Product;


class BackstagePass extends AbstractProduct
{
    // "Backstage passes", like aged brie, increases in Quality as its SellIn value approaches; Quality increases by 2
    // when there are 10 days or less and by 3 when there are 5 days or less but Quality drops to 0 after the concert

    public const QUALITY_INCREMENTS = 1;
    public const QUALITY_INCREMENTS_TWICE_AS_FAST = 10;
    public const QUALITY_INCREMENTS_THRICE_AS_FAST = 5;

    protected function changeQuality()
    {
        parent::changeQuality();

        if (
            $this->sellIn <= static::QUALITY_INCREMENTS_THRICE_AS_FAST &&
            $this->quality < static::QUALITY_MAX
        ) {
            $this->quality += static::QUALITY_INCREMENTS;
        }

        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}