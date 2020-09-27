<?php


namespace Framework\Command;


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
}