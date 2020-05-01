<?php


namespace App\Controller;

use App\Entity\User;
use App\Entity\Grade;
use App\Entity\Courses;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class GradeController extends AbstractController
{
    public function addGrade(Request $request)
    {
        $data =  json_decode($request->getContent(),true);

        $entityManager = $this->getDoctrine()->getManager();
        $user = $entityManager->getRepository(User::class);
        $student = $user->find($data['student_id']);
        $teacher = $user->find($data['teacher_id']);
        $course = $entityManager->getRepository(Courses::class)->find($data['course_id']);

        $grade = new Grade();
        $grade->setObservation($data['observation']);
        $grade->setStudent($student);
        $grade->setTeacher($teacher);
        $grade->setCourse($course);
        $grade->setGrade($data['grade']);

        $entityManager->persist($grade);
        $entityManager->flush();

        $response = new JsonResponse();
        $response->setData([
            'status'=>'ok'
        ]);
        return $response;
    }

}