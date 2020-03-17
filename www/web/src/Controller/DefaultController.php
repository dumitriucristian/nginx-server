<?php
namespace App\Controller;

use App\Entity\ClassRoom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function index()
    {
        $dummyData = [
            [
                'id' => 678,
                'title' => 'asdfasf',
            ],
            [
                'id' => 890,
                'title' => '1asdfasd3',
            ],
            [
                'id' => 126,
                'title' => 'sfaasfdasfda',
            ]
        ];
        $repository = $this->getDoctrine()->getRepository(ClassRoom::class);
        $classes = $repository->findAll();
        $encoders = [new JsonEncoder()];
        $normalizers = [new ObjectNormalizer()];

        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($classes, 'json');

        $response = new Response();
         $response->setContent($jsonContent);
         $response->headers->set('Content-Type', 'application/json');
        $response->headers->set('Access-Control-Allow-Origin','http://localhost:3000');

        return $response;
    }

}