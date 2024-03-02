<?php

namespace App\Project\Application\Events;

use Symfony\Component\Config\Definition\Exception\Exception;

class EventBus
{
    /** @var array<AbstractEventHandler> $handlers */
    private array $handlers = [];

    public function registerHandler(string $queryClass, AbstractEventHandler $handler): void
    {
        $this->handlers[$queryClass] = $handler;
    }

    /**
     * @param AbstractEvent $event
     */
    public function handle(AbstractEvent $event): void
    {
        $eventClass = get_class($event);

        if (!isset($this->handlers[$eventClass])) {
            throw new Exception(`Обработчик для ивента {$eventClass} не найден.`);
        }

        $handler = $this->handlers[$eventClass];
        $handler->handle($event);
    }
}