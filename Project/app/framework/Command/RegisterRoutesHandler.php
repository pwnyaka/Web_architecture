<?php


namespace Framework\Command;


use Framework\Contract\HandlerInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\RouteCollection;

class RegisterRoutesHandler implements HandlerInterface
{
    private $containerBuilder;
    private $routeCollection;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    public function kernelRegister()
    {
        $this->routeCollection = require dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR . 'routing.php';
        $this->containerBuilder->set('route_collection', $this->routeCollection);
        return $this->routeCollection;
    }
}