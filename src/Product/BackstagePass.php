<?php

declare(strict_types=1);

namespace App\Product;

class BackstagePass extends AbstractProduct
{
    /**
     * "Backstage passes", like aged brie, increases in Quality as its SellIn value approaches
     *
     * @inheritdoc
     */
    public const QUALITY_INCREMENTS = 1;

    /**
     * Quality increases by 2 when there are 10 days
     *
     * @inheritdoc
     */
    public const QUALITY_INCREMENTS_TWICE_AS_FAST = 10;

    /**
     * @var integer At which point does the sell in value cause the quality value to change three times as fast
     */
    public const QUALITY_INCREMENTS_THRICE_AS_FAST = 5;

    /**
     * @inheritdoc
     */
    protected function changeQuality()
    {
        parent::changeQuality();

        // Quality increases 3 when there are 5 days or less
        if (
            $this->sellIn <= static::QUALITY_INCREMENTS_THRICE_AS_FAST &&
            $this->quality < static::QUALITY_MAX
        ) {
            $this->quality += static::QUALITY_INCREMENTS;
        }

        // Quality drops to 0 after the concert
        if ($this->sellIn < 0) {
            $this->quality = 0;
        }
    }
}