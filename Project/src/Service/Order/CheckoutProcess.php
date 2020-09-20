<?php


namespace Service\Order;


use Contract\BasketBuilderInterface;
use Service\Billing\Exception\BillingException;
use Service\Billing\Transfer\Card;
use Service\Communication\Exception\CommunicationException;
use Service\Discount\NullObject;
use Service\Communication\Sender\Email;
use Service\User\Security;
use Symfony\Component\HttpFoundation\Request;

class CheckoutProcess
{
    /**
     * @var Card
     */
    private $billing;

    /**
     * @var NullObject
     */
    private $discount;

    /**
     * @var Email
     */
    private $communication;

    /**
     * @var Security
     */
    private $security;

    public function __construct(BasketBuilderInterface $builder)
    {
        $this->billing = $builder->getBilling();
        $this->discount = $builder->getDiscount();
        $this->communication = $builder->getCommunication();
        $this->security = $builder->getSecurity();
    }

    public function run() {
        $totalPrice = 0;
        $request = new Request();
        foreach ((new Basket($request->getSession()))->getProductsInfo() as $product) {
            $totalPrice += $product->getPrice();
        }

        $discount = $this->discount->getDiscount();
        $totalPrice = $totalPrice - $totalPrice / 100 * $discount;

        try {
            $this->billing->pay($totalPrice);
        }
        catch (BillingException $exception) {
            echo $exception->getMessage();
        }

        $user = $this->security->getUser();
        try {
            $this->communication->process($user, 'checkout_template');
        }
        catch (CommunicationException $exception) {
            echo $exception->getMessage();
        }

    }
}