<?php

declare(strict_types = 1);

namespace Service\Product;

use Model;
use Model\Entity\Product;
use Model\Repository\ProductRepository;
use Service\Product\Comparator\NameComparator;
use Service\Product\Comparator\PriceComparator;

class ProductService
{
    /**
     * Получаем информацию по конкретному продукту
     * @param int $id
     * @return Product|null
     */
    public function getInfo(int $id): ?Product
    {
        $product = $this->getProductRepository()->search([$id]);
        return count($product) ? $product[0] : null;
    }

    /**
     * Получаем все продукты
     * @param string $sortType
     * @return Product[]
     */
    public function getAll(string $sortType): array
    {
        $nameSorter = new ProductSorter(new NameComparator());
        $priceSorter = new ProductSorter(new PriceComparator());

        $productList = $this->getProductRepository()->fetchAll();

        if ($sortType === 'price') {
            $productList = $priceSorter->sort($productList);
        } elseif ($sortType === 'name') {
            $productList = $nameSorter->sort($productList);
        }

        return $productList;
    }

    /**
     * Фабричный метод для репозитория Product
     * @return ProductRepository
     */
    protected function getProductRepository(): ProductRepository
    {
        return new ProductRepository();
    }
}
