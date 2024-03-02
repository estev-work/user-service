<?php

namespace App\Project\Application\Exceptions;

class GetPostsException extends ApplicationLayerException
{
    public function __construct()
    {
        parent::__construct("Не удалось получить посты");
    }
}