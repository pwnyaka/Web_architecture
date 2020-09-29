<?php


namespace Framework\Command;


<<<<<<< HEAD
use Framework\Contract\HandlerInterface;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\PhpFileLoader;

class RegisterConfigsHandler implements HandlerInterface
{
    protected $containerBuilder;

    public function __construct(ContainerBuilder $containerBuilder)
    {
        $this->containerBuilder = $containerBuilder;
    }

    public function kernelRegister()
    {
        try {
            $fileLocator = new FileLocator(dirname(__DIR__, 2) .  DIRECTORY_SEPARATOR . 'config');
//            var_dump(dirname(__DIR__, 2));
//            die;
            $loader = new PhpFileLoader($this->containerBuilder, $fileLocator);
            $loader->load('parameters.php');
        } catch (\Throwable $e) {
            die('Cannot read the config file. File: ' . __FILE__ . '. Line: ' . __LINE__);
        }
    }

=======
use Contract\CommandInterface;

class RegisterConfigsHandler implements CommandInterface
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
            "{$this->command->registerConfigs()}.\n";
    }
>>>>>>> 8bfcaa4e7a204e62dd51079bbc5d9ff77e752378
}