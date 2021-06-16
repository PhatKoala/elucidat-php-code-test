<?php


namespace App\Product;

/**
 * Abstracting the behaviour of "Aged Brie" to apply to all cheeses
 */
class Cheese extends AbstractProduct
{
    // "Aged Brie" actually increases in Quality the older it gets
    public const QUALITY_INCREMENTS = 1;
}