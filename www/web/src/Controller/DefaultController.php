<?php
namespace App\Controller;

use App\Entity\ClassRoom;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Profiler\Profiler;
use Symfony\Component\Security\Core\Security;

class DefaultController extends AbstractController
{
    private $security;

    public function __construct(Security $security)
     {

         $this->security = $security;
    }

    public function index()
    {
        //dd("sss");
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
        $response->headers->set('Symfony-Debug-Toolbar-Replace', 1);

        return $response;
    }

    public function debug()
    {
        return new Response(
            '<html><body>Lucky number:15</body></html>'
        );
    }

}