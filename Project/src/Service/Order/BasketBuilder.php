<?php


namespace Service\Order;

use Service\Billing\BillingInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\CommunicationInterface;
use Service\Discount\DiscountInterface;
use Service\Discount\NullObject;
use Service\Communication\Sender\Email;
use Service\User\Security;
use Contract\BasketBuilderInterface;
use Service\User\SecurityInterface;


class BasketBuilder implements BasketBuilderInterface
{
    /**
     * @var ?BillingInterface
     */
    private $billing;

    /**
     * @var ?DiscountInterface
     */
    private $discount;

    /**
     * @var ?CommunicationInterface
     */
    private $communication;

    /**
     * @var ?SecurityInterface
     */
    private $security;

    /**
     * @return BillingInterface
     */
    public function getBilling(): ?BillingInterface
    {
        return $this->billing;
    }

    /**
     * @return DiscountInterface
     */
    public function getDiscount(): ?DiscountInterface
    {
        return $this->discount;
    }

    /**
     * @return CommunicationInterface
     */
    public function getCommunication(): ?CommunicationInterface
    {
        return $this->communication;
    }

    /**
     * @return SecurityInterface
     */
    public function getSecurity(): ?SecurityInterface
    {
        return $this->security;
    }

    /**
     * @param BillingInterface $billing
     * @return BasketBuilderInterface
     */
    public function setBilling(BillingInterface $billing): BasketBuilderInterface
    {
        $this->billing = $billing;
        return $this;
    }

    /**
     * @param DiscountInterface $discount
     * @return BasketBuilderInterface
     */
    public function setDiscount(DiscountInterface $discount): BasketBuilderInterface
    {
        $this->discount = $discount;
        return $this;
    }

    /**
     * @param CommunicationInterface $communication
     * @return BasketBuilderInterface
     */
    public function setCommunication(CommunicationInterface $communication): BasketBuilderInterface
    {
        $this->communication = $communication;
        return $this;
    }

    /**
     * @param SecurityInterface $security
     * @return BasketBuilderInterface
     */
    public function setSecurity(SecurityInterface $security): BasketBuilderInterface
    {
        $this->security = $security;
        return $this;
    }
}