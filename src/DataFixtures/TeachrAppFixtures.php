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

    private function createStudents(Course $course, ObjectManager $manager){
        $faker = \Faker\Factory::create('fr_FR'); 
        for($i=0; $i<6; $i++){
            $student = new Student();
            $student->setFirstName($faker->firstname)
                ->setLastName($faker->lastname);
                if($course->getIsBooked() && $i%3==0){
                     $student->addCourse($course);
                }
                $manager->persist($student);
            }
    }
    public function createCourses(ObjectManager $manager){
        $areas = ["cours de mathématiques", "cours de français","cours de philosophie"
        ,"cours d'histoire","cours de sport","cours d'anglais","cours d'espagnol"];
        for($i=0; $i<count($areas); $i++){
            $course = new Course();
            $course->setName($areas[$i])
            ->setStartingDay(new \DateTime())
            ->setIsBooked($i%2 == 0);
            $manager->persist($course);
            $this->createStudents($course,$manager);
            $this->createTeachers($course,$manager);

        }

    }
    private function createTeachers(Course $course, ObjectManager $manager){
        $faker = \Faker\Factory::create('fr_FR'); 
        for($i=0; $i<6; $i++){
            $teacher = new Teacher();
            $teacher->setFirstName($faker->firstname)
                ->setLastName($faker->lastname)
                ->addCourse($course);
            $manager->persist($teacher);
        }
    }

}
