<?php


namespace App\Product;

/**
 * Abstracting the behaviour of "Sulfuras" to apply to all legendary items
 */
class Legendary extends AbstractProduct
{
    // "Sulfuras", being a legendary item, never has to be sold or decreases in Quality
    public const SELL_IN_INCREMENTS = 0;
    public const QUALITY_INCREMENTS = 0;
}