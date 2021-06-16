<?php

declare(strict_types=1);

namespace App;

use App\Product\ProductInterface;
use Psr\Log\LoggerInterface;

class GildedRose
{
    /**
     * @var Item[] An array of products
     */
    private array $items;

    /**
     * @var LoggerInterface
     */
    private LoggerInterface $logger;

    /**
     * @param Item[] $items
     * @param LoggerInterface|null $logger
     */
    public function __construct(array $items, LoggerInterface $logger = null)
    {
        $this->items = $items;
    }

    /**
     * @param null $name
     * @return array|Item
     */
    public function getItem($name = null)
    {
        return ($name === null
            ? $this->items
            : $this->items[$name]
        );
    }

    public function nextDay()
    {
        foreach ($this->items as $item) {
            if ($item instanceof ProductInterface) {
                $item->nextDay();
            } else {
                if (!is_null($this->logger)) {
                    $this->logger->alert(sprintf(
                        'The product %s (%s) does not implement the interface %s',
                        $item->name,
                        get_class($item),
                        ProductInterface::class
                    ));
                }
            }

//            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                if ($item->quality > 0) {
//                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                        $item->quality = $item->quality - 1;
//                    }
//                }
//            } else {
//                if ($item->quality < 50) {
//                    $item->quality = $item->quality + 1;
//                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->sellIn < 11) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                        if ($item->sellIn < 6) {
//                            if ($item->quality < 50) {
//                                $item->quality = $item->quality + 1;
//                            }
//                        }
//                    }
//                }
//            }
//            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                $item->sellIn = $item->sellIn - 1;
//            }
//            if ($item->sellIn < 0) {
//                if ($item->name != 'Aged Brie') {
//                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
//                        if ($item->quality > 0) {
//                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
//                                $item->quality = $item->quality - 1;
//                            }
//                        }
//                    } else {
//                        $item->quality = $item->quality - $item->quality;
//                    }
//                } else {
//                    if ($item->quality < 50) {
//                        $item->quality = $item->quality + 1;
//                    }
//                }
//            }
        }
    }
}
