<?php

namespace App\Project\Application\Commands;

use App\Project\Domain\Repository\UserRepositoryInterface;
use Monolog\Logger;

abstract class AbstractCommandHandler
{
    protected Logger $logger;

    public function __construct(protected readonly UserRepositoryInterface $userRepository)
    {
        $this->logger = new Logger(static::class);
    }

    abstract public function handle(AbstractCommand $command);
}