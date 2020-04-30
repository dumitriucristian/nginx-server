<?php


namespace App\Controller;

use App\Entity\SchoolClass;
use App\Entity\School;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ClassController extends AbstractController
{
    //@todo do not allow duplicate classes to be added check unique name
    public function addClass(Request $request)
    {
        $data = json_decode($request->getContent(),true);
        $class = new SchoolClass();

        $class->setLevel( $data['level']);
        $class->setClassIndex( $data['index']);
        $class->setName( $data['name']);

        $entityManager = $this->getDoctrine()->getManager();
        $school = $entityManager->getRepository(School::class)->find($data['school_id']);
        $class->setSchool($school);


        $entityManager->persist($class);
        $entityManager->flush();

        $response = new JsonResponse();
        $response->setData(
            ['status' =>  'ok']
        );


        return $response;
    }
}