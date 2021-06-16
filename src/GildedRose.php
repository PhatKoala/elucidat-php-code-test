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
     * @var LoggerInterface|null
     */
    private ?LoggerInterface $logger;

    /**
     * @param Item[] $items
     * @param LoggerInterface|null $logger Except null so I don't actually have to implement a logger
     */
    public function __construct(array $items, LoggerInterface $logger = null)
    {
        $this->items = $items;
        $this->logger = $logger;
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

    /**
     * Change items stock management after each day
     */
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
        }
    }
}
