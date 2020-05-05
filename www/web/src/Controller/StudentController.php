<?php


namespace App\Controller;


use App\Entity\User;
use App\Services\Serializer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class StudentController extends AbstractController
{
    public function getAllStudents(Serializer $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $users = $entityManager->getRepository(User::class)->getAllStudents();
        $rsp = $serializer->serialize($users);

        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );

        return $response;
    }

}