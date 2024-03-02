<?php

namespace App\Project\Application\Events;

use App\Project\Domain\EventHandlers\EventPublisherInterface;
use Monolog\Logger;

abstract class AbstractEventHandler
{
    protected Logger $logger;

    public function __construct(protected readonly EventPublisherInterface $eventPublisher)
    {
        $this->logger = new Logger(static::class);
    }

    public abstract function handle(AbstractEvent $event): void;
}