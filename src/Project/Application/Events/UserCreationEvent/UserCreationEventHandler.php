<?php

namespace App\Project\Application\Events\UserCreationEvent;

use App\Project\Application\Events\AbstractEvent;
use App\Project\Application\Events\AbstractEventHandler;

class UserCreationEventHandler extends AbstractEventHandler
{

    public function handle(UserCreationEvent|AbstractEvent $event): void
    {
        $this->eventPublisher->publish(
            $this->eventPublisher::postCreated,
            $event->getUserAggregate()->toArray()
        );
        $this->logger->info('Событие: User с id' . $event->getUserAggregate()->getId() . ' создан.');
    }
}