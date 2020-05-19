<?php


namespace App\Controller;


use App\Entity\User;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;


class UserController extends AbstractController
{
    public function getUsers()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();

        $response = new JsonResponse();
        $response->setData(
            ["users"=>$users]
        );

        return $response;
    }

}