<?php

namespace App\Project\Domain;

class UserAggregate
{

    /**
     */
    private function __construct()
    {
    }

    public static function make(): self
    {
        return new UserAggregate();
    }

    #region FUNCTIONS

    public function toArray(): array
    {
        return [

        ];
    }
    #endregion

    #region GETTERS & SETTERS

    #endregion
}