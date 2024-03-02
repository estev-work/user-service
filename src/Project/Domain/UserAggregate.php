<?php

namespace App\Project\Domain;

use App\Project\Domain\ValueObjects\UserId;
use App\Project\Domain\ValueObjects\UserName;

class UserAggregate
{
    private UserId $id;
    private UserName $userName;

    /**
     */
    private function __construct(
        UserName $userName
    ) {
        $this->userName = $userName;
    }

    public static function make(string $username): self
    {
        return new UserAggregate(new UserName($username));
    }

    #region FUNCTIONS

    public function toArray(): array
    {
        return [
            'userName' => $this->userName
        ];
    }
    #endregion

    #region GETTERS & SETTERS

    /**
     * @return UserName
     */
    public function getUserName(): UserName
    {
        return $this->userName;
    }

    public function getId(): UserId
    {
        return $this->id;
    }

    #endregion
}