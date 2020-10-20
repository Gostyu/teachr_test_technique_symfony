<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
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
    public function home(CourseRepository $repo){
        $courses=$repo->findBy(
            array('is_booked' => false)
        );
        return $this->render('home.html.twig',['courses'=>$courses]);
    }
    /**
     * @Route("/mes_cours",name="mes_cours")
     */
    public function myCourses(){
        return $this->render('student/myCourses.html.twig');
    }
    /**
     * @Route("/mon_profil", name="mon_profil")
     */
    public function myProfile(){
        return $this->render('student/myProfile.html.twig');
    } 
}
