<?php


namespace App\Controller;

use App\Entity\SchoolClass;
use App\Entity\School;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Services\Serializer;

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

    public function getClasses(Request $request, Serializer $serializer)
    {
        //get all classes in school
        $entityManager = $this->getDoctrine()->getManager();
        $classes = $entityManager->getRepository(SchoolClass::class)->findAll();
        $rsp = $serializer->serialize($classes,['id', 'name', 'level', 'classIndex','school']);

        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );


        return $response;


    }

    public function classDetails(Request $request, Serializer $serializer)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $classes = $entityManager->getRepository(SchoolClass::class)->find($request->get('id'));
        $rsp = $serializer->serialize($classes);
  
        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );


        return $response;
    }
}