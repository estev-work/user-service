<?php

namespace App\Project\Application\Commands\CreateNewPost;

use App\Project\Application\Commands\AbstractCommand;

class CreateNewPostCommand extends AbstractCommand
{
    public function __construct(
        protected string $userName,
    ) {
    }

    public function getUserName(): string
    {
        return $this->userName;
    }
}