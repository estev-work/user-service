<?php

namespace App\Project\Application\Exceptions;

class CreatePostException extends ApplicationLayerException
{
    public function __construct()
    {
        parent::__construct("Не удалось создать пост");
    }
}