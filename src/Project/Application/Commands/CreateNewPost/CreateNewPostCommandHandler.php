<?php

namespace App\Project\Application\Commands\CreateNewPost;

use App\Project\Application\Commands\AbstractCommand;
use App\Project\Application\Commands\AbstractCommandHandler;
use App\Project\Application\Exceptions\ApplicationLayerException;
use App\Project\Application\Exceptions\CreatePostException;
use App\Project\Domain\UserAggregate;
use Exception;

class CreateNewPostCommandHandler extends AbstractCommandHandler
{
    protected UserAggregate $aggregate;

    /**
     * @throws ApplicationLayerException
     * @throws Exception
     */
    public function handle(CreateNewPostCommand|AbstractCommand $command): UserAggregate
    {
        $this->aggregate = UserAggregate::make(
            username: $command->getUserName(),
        );
        try {
            $this->userRepository->savePost($this->aggregate);
        } catch (Exception $exception) {
            throw new CreatePostException();
        }
        $this->logger->info("Created new post {$this->aggregate->getId()}");
        return $this->aggregate;
    }
}