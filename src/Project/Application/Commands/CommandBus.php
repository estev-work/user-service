<?php

namespace App\Project\Application\Commands;

use App\Project\Domain\UserAggregateInterface;
use Symfony\Component\Config\Definition\Exception\Exception;

class CommandBus
{
    /** @var array<AbstractCommandHandler> $handlers */
    private array $handlers = [];

    public function registerHandler(string $commandClass, AbstractCommandHandler $handler): void
    {
        $this->handlers[$commandClass] = $handler;
    }

    public function handle(AbstractCommand $command): UserAggregateInterface
    {
        $commandClass = get_class($command);

        if (!isset($this->handlers[$commandClass])) {
            throw new Exception(`Обработчик для команды {$commandClass} не найден.`);
        }

        $handler = $this->handlers[$commandClass];
        return $handler->handle($command);
    }
}