<?php


namespace App\Controller;


use App\Entity\User;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\Serializer;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{
    public function getUsers(Serializer $serializer)
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findAll();
        $rsp = $serializer->serialize($users);

        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;

    }

}