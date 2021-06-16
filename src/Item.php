<?php

declare(strict_types=1);

namespace App;

class Item
{
    /**
     * @var string The name of the product
     */
    public string $name;

    /**
     * @var int The number of days we have to sell the item
     */
    public int $sellIn;

    /**
     * @var int How valuable the item is
     */
    public int $quality;

    /**
     * @param string $name
     * @param int $quality
     * @param int $sellIn
     */
    public function __construct(string $name, int $quality, int $sellIn)
    {
        $this->name = $name;
        $this->quality = $quality;
        $this->sellIn = $sellIn;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "{$this->name}, {$this->sellIn}, {$this->quality}";
    }
}
