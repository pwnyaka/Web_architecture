<?php


namespace Service\SocialNetworks;


use Symfony\Component\HttpFoundation\Session\SessionInterface;

class SocialAdapter implements SocialAdapterInterface
{
    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function login(string $social): bool
    {
        // метод выполняет авторизацию через какую-либо соц.сеть
    }

    public function logout(): void
    {
        // разлогиниться
    }
}