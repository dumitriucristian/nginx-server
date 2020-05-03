<?php


namespace App\Controller;


use App\Entity\School;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\HttpFoundation\JsonResponse;


class SchoolController extends AbstractController
{
    public function addSchool(Request $request)
    {
        $data = json_decode($request->getContent(),true);

        $school = new School();
        $school->setName( $data['name']);
        $school->setDescription( $data['description']);
        $school->setAddress( $data['address']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($school);
        $entityManager->flush();

        $response =  new JsonResponse();
        $response->setData([
            'status' => 'ok'
        ]);

        return $response;
    }

    public function getSchools(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $classes = $entityManager->getRepository(School::class)->getAllSchools();

        $response = new JsonResponse();
        $response->setData([
            'status'=>'ok',
            'data'=>$classes
        ]);

        return $response;
    }



}