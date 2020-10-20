<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\StudentRepository;
use App\Repository\CourseRepository;
class StudentController extends AbstractController
{
    /**
     * @Route("/student", name="student")
     */
    public function index()
    {
        return $this->render('student/index.html.twig', [
            'controller_name' => 'StudentController',
        ]);
    }
    /**
     * @Route("/", name="accueil")
     */
    public function home(CourseRepository $courseRepo,StudentRepository $studentRepo){
        $courses = $courseRepo->findBy(array("is_booked"=>false));
        $student = $studentRepo->findOneByFirstname("Thomas");
        $course = $student->getCourses()->current();
        return $this->render('student/home.html.twig',['courses'=>$courses,'name'=>$student->getFirstname(),'next_course'=>$course]);
    }

    /**
     * @Route("/mes_cours",name="mes_cours")
     */
    public function myCourses(StudentRepository $repo){
        $student=$repo->findOneByFirstname("Thomas");
        return $this->render('student/myCourses.html.twig',['courses'=>$student->getCourses()]);
    }
    /**
     * @Route("/mon_profil", name="mon_profil")
     */
    public function myProfile(){
        return $this->render('student/myProfile.html.twig');
    } 
}
