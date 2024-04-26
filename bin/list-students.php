<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);
$studentList = $studentRepository->studentsAndCourses();

// /** @var Student[] $studentList */
// $studentList = $entityManager->getRepository(Student::class)->findAll();

foreach ($studentList as $student) {
  echo "ID: $student->id\nNome: $student->name\n";

  if ($student->phones()->count() > 0) {
    echo "Telefones: ";

    echo implode(', ', $student->phones()
      ->map(fn (Phone $phone) => $phone->number)
      ->toArray());

    // foreach ($student->phones() as $phone) {
    //   echo $phone->number . PHP_EOL;
    // }
  }

  echo PHP_EOL;

  if ($student->courses()->count() > 0) {
    echo "Cursos: ";

    echo implode(', ', $student->courses()
      ->map(fn (Course $course) => $course->name)
      ->toArray());
  }

  echo PHP_EOL;
  echo PHP_EOL;
}

// /** @var Student $student */
// $student = $studentRepository->find(2);
// echo $student->name;

// $student2 = $studentRepository->findBy(["name"=> "Jeca 5"]);
// var_dump($student2);

// $student3 = $studentRepository->findOneBy(["name"=> "Jeca 5"]);
// var_dump($student3);

// echo $studentRepository->count([]) . PHP_EOL;
// echo count($studentList) . PHP_EOL;

$studentClass = Student::class;
$dql = "SELECT COUNT(student) FROM $studentClass student WHERE SIZE(student.phones) = 2";
$query = $entityManager->createQuery($dql)->enableResultCache(lifetime: 86400);
$singleScalarResult = $query->getSingleScalarResult();
var_dump($singleScalarResult);
