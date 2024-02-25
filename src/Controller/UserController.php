<?php

namespace App\Controller;

use App\Requests\GetUsersRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

#[Route('users', name: 'users_', requirements: [])]
class AuthController extends AbstractController
{
    #[Route(name: 'all', methods: 'GET', format: 'json')]
    public function getAll(
        GetUsersRequest $request
    ): JsonResponse {
        //TODO
        return $this->json([
            "data" => ['result' => 'worked']
        ]);
    }
}
