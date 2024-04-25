<?php

namespace Alura\Doctrine\Repository;

use Alura\Doctrine\Entity\Student;
use Doctrine\ORM\EntityRepository;

class DoctrineStudentRepository extends EntityRepository
{
  // public function add(Student $student)
  // {
  //   $this->getEntityManager()->persist($student);
  //   $this->getEntityManager()->flush();
  // }

  public function studentsAndCourses(): array
  {
    return $this->createQueryBuilder("student")
      ->addSelect('phone')
      ->addSelect('course')
      ->leftJoin('student.phones', 'phone')
      ->leftJoin('student.courses', 'course')
      ->getQuery()
      ->getResult();

    // $dql = 'SELECT student, phone, course
    //         FROM Alura\\Doctrine\\Entity\\Student student
    //         LEFT JOIN student.phones phone
    //         LEFT JOIN student.courses course
    //       ';
    // return $this->getEntityManager()->createQuery($dql)->getResult();
  }
}
