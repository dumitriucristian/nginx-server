<?php


namespace App\Controller;

use App\Entity\SchoolClass;
use App\Entity\School;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\AbstractNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Serializer\Normalizer\AbstractObjectNormalizer;
use Symfony\Component\Serializer\Annotation\MaxDepth;

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

    public function getClasses(Request $request)
    {
        //get all classes in school
        $entityManager = $this->getDoctrine()->getManager();
        $classes = $entityManager->getRepository(SchoolClass::class)->findAll();

        //avoid circular refference error
        $encoder = new JsonEncoder();
        $defaultContext = [
             AbstractNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object, $format, $context) {
                return $object->getName();
            },
        ];

        $normalizer = new ObjectNormalizer(
            null,
            null,
            null,
            null,
            null,
            null,
            $defaultContext
        );

        $serializer = new Serializer([$normalizer], [$encoder]);

        //serialize
        $rsp = $serializer->serialize($classes, 'json',[

            AbstractNormalizer::IGNORED_ATTRIBUTES => ['password'],
            AbstractNormalizer::GROUPS => ['classdata'],
            AbstractNormalizer::ATTRIBUTES => ['id', 'name', 'level', 'classIndex']

        ]);

        //add response
        $response = new Response(
            $rsp,
            Response::HTTP_OK,
            ['content-type' => 'application/json']
        );


        return $response;




    }

    public function getClassDetails(Request $request)
    {
        $entityManager = $this->getDoctrine()->getManager();
        $classes = $entityManager->getRepository(SchoolClass::class)->getClassDetails($request->get('id'));

        $response = new JsonResponse();
        $response->setData([
            'status'=>'ok',
            'data'=>$classes
        ]);

        return $response;
    }
}