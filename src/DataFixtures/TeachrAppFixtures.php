<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Teacher;
use App\Entity\Student;
use App\Entity\Course;
class TeachrAppFixtures extends Fixture
{

    public function load(ObjectManager $manager)
    {        
        // $product = new Product();
        // $manager->persist($product);
        $this->createCourses($manager);
        $manager->flush();
    }

    private function createStudents(Array $courses, ObjectManager $manager){
        $faker = \Faker\Factory::create('fr_FR'); 
            $student = new Student();
            $student->setFirstName($faker->firstname)
                ->setLastName($faker->lastname);
                    $student->setFirstName("Thomas")
                    ->setLastName($faker->lastname);
                    $i=0;
                    while($i<count($courses)){
                        if($courses[$i]->getIsBooked()){
                            $student->addCourse($courses[$i]);
                        }
                        $i++;
                    }
                $manager->persist($student);
    }
    public function createCourses(ObjectManager $manager){
        $areas = ["Cours de mathématiques", "Cours de français","Cours de philosophie"
        ,"Cours d'histoire","Cours de sport","Cours d'anglais","Cours d'espagnol"];
        $courses = [];
        for($i=0; $i<count($areas); $i++){
            $course = new Course();
            $course->setName($areas[$i])
            ->setStartingDay(new \DateTime())
            ->setIsBooked($i%2 == 0);
            $manager->persist($course);
            array_push($courses, $course);
        }
        $this->createTeachers($courses,$manager);
        $this->createStudents($courses,$manager);
    }
    private function createTeachers(Array $courses, ObjectManager $manager){
        $faker = \Faker\Factory::create('fr_FR'); 
        for($i=0; $i<14; $i++){
            $teacher = new Teacher();
            $teacher->setFirstName($faker->firstname)
                ->setLastName($faker->lastname)
                ->addCourse($courses[$i % count($courses)]);
            $manager->persist($teacher);
        }
    }

}
