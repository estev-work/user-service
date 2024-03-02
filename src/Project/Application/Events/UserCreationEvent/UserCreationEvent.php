<?php

namespace App\Project\Application\Events\UserCreationEvent;

use App\Project\Application\Events\AbstractEvent;
use App\Project\Domain\UserAggregate;

class UserCreationEvent extends AbstractEvent
{
    public function __construct(protected UserAggregate $userAggregate)
    {
    }

    public function getUserAggregate(): UserAggregate
    {
        return $this->userAggregate;
    }

}