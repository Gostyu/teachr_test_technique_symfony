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
        $faker = Faker\Factory::create('fr_FR'); 
        
        // $product = new Product();
        // $manager->persist($product);
        createCourses($faker,$manager);
        $manager->flush();
    }

    private function createStudents(Faker $faker,Course $course, ObjectManager $manager){
        for($i=0; $i<6; $i++){
            $student = new Student();
            $student->setFirstName($faker->firstname)
                ->setLastName($faker->lastname)
                ->addCourses($course->getIsBooked() ? $course : null);
                $manager->persist($student);
            }
    }
    private function createCourses(Faker $faker,ObjectManager $manager){
        $areas = ["cours de mathématiques", "cours de français","cours de philosophie"
        ,"cours d'histoire","cours de sport","cours d'anglais","cours d'espagnol"];
        for($i=0; $i<$count($cours); $i++){
            $course = new Course();
            $course->setName($areas[$i])
            ->setStartingDay($faker->dateTimeBetween("+7 days"))
            ->isBooked($i%2 == 0);
            createStudents($faker,$course);
            createTeachers($faker,$course);
        }

    }
    private function createTeachers(Faker $faker, Course $course, ObjectManager $manager){
        for($i=0; $i<6; $i++){
            $teacher = new Teacher();
            $teacher->setFirstName($faker->firstname)
                ->setLastName($faker->lastname)
                ->addCourse(mt_rand(0,6)<mt_rand(0,6)? $course:null);
            $manager->persist($student);
        }
    }
}
