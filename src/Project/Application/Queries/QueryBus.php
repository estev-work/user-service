<?php

namespace App\Project\Application\Queries;

use App\Project\Domain\PostAggregate;
use Symfony\Component\Config\Definition\Exception\Exception;

class QueryBus
{
    /** @var array<AbstractQueryHandler> $handlers */
    private array $handlers = [];

    public function registerHandler(string $queryClass, AbstractQueryHandler $handler): void
    {
        $this->handlers[$queryClass] = $handler;
    }

    /**
     * @param AbstractQuery $query
     * @return PostAggregate|array|PostAggregate[]
     */
    public function handle(AbstractQuery $query): PostAggregate|array
    {
        $queryClass = get_class($query);

        if (!isset($this->handlers[$queryClass])) {
            throw new Exception(`Обработчик для запроса {$queryClass} не найден.`);
        }

        $handler = $this->handlers[$queryClass];
        return $handler->handle($query);
    }
}