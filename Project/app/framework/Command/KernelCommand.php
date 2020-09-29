<?php


namespace Framework\Command;


use Framework\Contract\CommandInterface;
use Framework\Contract\HandlerInterface;

class KernelCommand implements CommandInterface
{

    private $command;

    public function __construct(HandlerInterface $command)
    {
        $this->command = $command;
    }

    public function execute()
    {
       return $this->command->kernelRegister();
    }
}