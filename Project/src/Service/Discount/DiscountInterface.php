<?php

declare(strict_types = 1);

namespace Service\Discount;

interface DiscountInterface
{
    /**
     * Получаем скидку в процентах
     * @return float
     */
    /*
     * Factory Method.
     * Метод getDiscount определен в интерфейсе, классы NullObject.php, PromoCode.php,
     * VipDiscount.php каждый реализуют его по своему новых объектов не создается,
     *  но суть фабричного метода на мой взгляд отражена. Так же фабричные методы содержатся в сервисах, правда стоит
     *  сделать общий интерфейс для них, где будет объявлен метод getServiceRepository(): RepositoryInterface.
     */
    public function getDiscount(): float;
}
