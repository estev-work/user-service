<?php

namespace App\Project\Domain\Repository;

use App\Project\Domain\UserAggregate;
use Exception;

interface UserRepositoryInterface
{
    /**
     * @param UserAggregate $userAggregate
     * @return UserAggregate
     * @throws Exception
     */
    public function savePost(UserAggregate $userAggregate): UserAggregate;

    /**
     * @param string $userId
     * @return UserAggregate
     * @throws Exception
     */
    public function getPostById(string $userId): UserAggregate;

    /**
     * @return array
     * @throws Exception
     */
    public function getPosts(): array;
}