<?php

use Alura\Doctrine\Entity\Course;
use Alura\Doctrine\Entity\Phone;
use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
  echo "ID: $student->id\nNome: $student->name\n";

  if ($student->phones()->count() > 0) {
    echo "Telefones:\n";
  
    echo implode(', ', $student->phones()
      ->map(fn (Phone $phone) => $phone->number)
      ->toArray());
  
    // foreach ($student->phones() as $phone) {
    //   echo $phone->number . PHP_EOL;
    // }
  }

  if ($student->courses()->count() > 0) {
    echo "Cursos:\n";
  
    echo implode(', ', $student->courses()
      ->map(fn (Course $course) => $course->nome)
      ->toArray());
  }

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