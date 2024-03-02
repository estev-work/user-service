<?php

namespace App\Project\Application\Queries;

use App\Project\Domain\Repository\PostRepositoryInterface;
use Monolog\Logger;

abstract class AbstractQueryHandler
{
    protected Logger $logger;

    public function __construct(protected readonly PostRepositoryInterface $postRepository)
    {
        $this->logger = new Logger(static::class);
    }

    public abstract function handle(AbstractQuery $query);
}