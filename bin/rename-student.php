<?php

use Alura\Doctrine\Entity\Student;
use Alura\Doctrine\Helper\EntityManagerCreator;

require_once __DIR__ . '/../vendor/autoload.php';

$entityManager = EntityManagerCreator::createEntityManager();

$studentRepository = $entityManager->getRepository(Student::class);

// $student = $studentRepository->find($argv[1]);
$student = $entityManager->find(EntityManagerCreator::class, $argv[1]);

// $entityManager->persist($student);

$entityManager->flush();