<?php


namespace App\Controller;


use App\Entity\User;
use App\Services\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class TeacherController extends AbstractController
{

    public function getTeachers(Serializer $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->getAllTeachers();
        $rsp = $serializer->serialize($users);

        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;
    }

}