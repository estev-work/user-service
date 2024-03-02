<?php

namespace App\Project\Application\Exceptions;

use Symfony\Component\HttpFoundation\Response;

abstract class ApplicationLayerException extends \Exception
{
    public function __construct(string $message = "")
    {
        parent::__construct($message, Response::HTTP_BAD_REQUEST);
    }
}