<?php


namespace Service\Product\Comparator;


use Model\Entity\Product;
use Contract\ComparatorInterface;

class PriceComparator implements ComparatorInterface
{
    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getPrice() <=> $b->getPrice();
    }
}