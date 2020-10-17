<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

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
    public function home(){
        return $this->render('base.html.twig');
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
