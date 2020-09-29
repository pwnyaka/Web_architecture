<?php


namespace Framework\Command;


<<<<<<< HEAD
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
=======
use Contract\CommandInterface;

class RegisterRoutesHandler implements CommandInterface
{
    /**
     * @var \Kernel
     */
    private $command;

    /**
     * RegisterUser constructor.
     * @param \Kernel $command
     */
    public function __construct(\Kernel $command)
    {
        $this->command = $command;
    }

    /**
     * Выполнение команды.
     */
    public function execute(): void
    {
        echo "Регистрируем пользователя с именем " .
            "{$this->command->registerRoutes()}.\n";
>>>>>>> 8bfcaa4e7a204e62dd51079bbc5d9ff77e752378
    }
}