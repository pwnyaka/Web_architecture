<?php


namespace Service\SocialNetworks;


interface SocialAdapterInterface
{
    public function login(string $social): bool;

    public function logout(): void;
}