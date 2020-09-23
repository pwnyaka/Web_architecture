<?php


namespace Facade;


use Contract\BasketBuilderInterface;
use Service\Billing\Transfer\Card;
use Service\Communication\Sender\Email;
use Service\Discount\NullObject;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

class BasketManager
{
    private $basketBuilder;
    private $session;

    public function __construct(BasketBuilderInterface $basketBuilder, SessionInterface $session)
    {
        $this->basketBuilder = $basketBuilder;
        $this->session = $session;
    }

    public function setCheckout()
    {
        $this->basketBuilder->setBilling(new Card())->setDiscount(new NullObject())->setCommunication(new Email())->setSecurity(new Security($this->session));
        return $this->basketBuilder;
    }
}