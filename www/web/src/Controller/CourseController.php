<?php


namespace App\Controller;

use App\Entity\User;
use App\Entity\Courses;
use App\Entity\SchoolClass;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CourseController extends AbstractController
{
    public function addCourse(Request $request)
    {
        $data = json_decode($request->getContent(),true);

        $course = new Courses();
        $course->setName($data['name']);
        $course->setDescription($data['description']);
        $entityManager = $this->getDoctrine()->getManager();

        $class = $entityManager->getRepository(SchoolClass::class)->find($data['school_class_id']);
        $course->setSchoolClass($class);

        $entityManager->persist($course);
        $entityManager->flush();
        $response = new JsonResponse();
        $response->setData(
            ['status'=>'ok']
        );

        return $response;
    }

    public function addTeacher(Request $request)
    {

        $data = json_decode($request->getContent(),true);

        $entityManager = $this->getDoctrine()->getManager();
        $course = $entityManager->getRepository(Courses::class)->find($data['course_id']);
        $user = $entityManager->getRepository(User::class)->find($data['teacher_id']);
        $course->setTeacher($user);
        $entityManager->persist($course);
        $entityManager->flush();

        $response =  new JsonResponse();
        $response->setData(
            ['status'=> 'ok']
        );

        return $response;
    }
}