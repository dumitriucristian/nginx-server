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
    public function __construct(UserRepository $userRepository, UserPasswordEncoderInterface $encoder)
    {
        $this->userRepository = $userRepository;
        $this->encoder = $encoder;

    }

    public function register(Request $request)
    {
        $data = json_decode($request->getContent(),true);
        $email = $data["username"];

        $user = $this->userRepository->findOneBy([
           'email' => $email,
        ]);

        if(!is_null($user)){
            return "user exist";
        }

        $user = new User();
        $password = $this->encoder->encodePassword($user,'test');
        $user->setPassword($password);
        $user->setEmail("test@test.com");

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();
        dd($user);



    }
}