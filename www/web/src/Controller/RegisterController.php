<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{
    public function construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;

    }

    public function register(UserPasswordEncoderInterface $encoder)
    {
        $username ="test@test.com";
        $user = new User();
        $password = $encoder->encodePassword($user,'test');
        $user->setPassword($password);
        $user->setEmail("test@test.com");

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        dd($user);



    }
}