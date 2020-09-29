<?php


namespace Service\Product\Comparator;


use Model\Entity\Product;
use Contract\ComparatorInterface;

class NameComparator implements ComparatorInterface
{
    /**
     * @param Product $a
     * @param Product $b
     * @return int
     */
    public function compare($a, $b): int
    {
        return $a->getName() <=> $b->getName();
    }
}