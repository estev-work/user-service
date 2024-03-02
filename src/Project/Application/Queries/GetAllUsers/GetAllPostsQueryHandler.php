<?php

namespace App\Project\Application\Queries\GetAllUsers;

use App\Project\Application\Exceptions\ApplicationLayerException;
use App\Project\Application\Exceptions\GetPostsException;
use App\Project\Application\Queries\AbstractQuery;
use App\Project\Application\Queries\AbstractQueryHandler;
use App\Project\Domain\PostAggregate;
use Exception;

class GetAllPostsQueryHandler extends AbstractQueryHandler
{
    /** @var PostAggregate[] $aggregates */
    protected array $aggregates;

    /**
     * @throws ApplicationLayerException
     * @throws Exception
     */
    public function handle(GetAllPostsQuery|AbstractQuery $query): array
    {
        //TODO Сделать пагинацию
        try {
            $this->aggregates = $this->postRepository->getPosts();
        } catch (Exception $exception) {
            throw new GetPostsException();
        }
        $this->logger->info("Получены все посты");
        return $this->aggregates;
    }
}