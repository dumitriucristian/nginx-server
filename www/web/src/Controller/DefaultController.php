<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\User;

class DefaultController extends AbstractController
{
    public function index()
    {

        return new Response("this is home page");
    }

    public function test()
    {
        $repository = $this->getDoctrine()
            ->getRepository(User::class);
        $users = $repository->findAll();


        return new Response("this is home page that shoud be access with auth");
    }

}