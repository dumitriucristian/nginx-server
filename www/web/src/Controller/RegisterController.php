<?php
namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

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
        $password = $this->encoder->encodePassword($user,$data['password']);
        $user->setPassword($password);
        $user->setEmail($data['username']);

        $user->setRoles(['ROLE_'.$data['role']]);
        $user->setFullname($data['fullname']);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($user);
        $entityManager->flush();


        $response = new JsonResponse();
        $response->setData([
            'status'=>  'ok',
            'data' => [
                'user' => [
                    'email' => $user->getEmail(),
                    'roles' => $user->getRoles()
                ]
            ]
        ]);


        return $response;

    }
}