<?php

// use Alura\Doctrine\Helper\EntityManagerCreator;
// use Doctrine\ORM\Tools\Console\ConsoleRunner;

// require_once 'vendor/autoload.php';

// $entityManager = EntityManagerCreator::createEntityManager();

// return ConsoleRunner
// ::createHelperSet($entityManager);

require_once 'vendor/autoload.php';

use Alura\Doctrine\Helper\EntityManagerCreator;
use Doctrine\Migrations\Configuration\EntityManager\ExistingEntityManager;
use Doctrine\Migrations\Configuration\Migration\PhpFile;
use Doctrine\Migrations\DependencyFactory;

$config = new PhpFile(__DIR__ . '/migrations.php');

$entityManager = EntityManagerCreator::createEntityManager();

return DependencyFactory::fromEntityManager($config, new ExistingEntityManager($entityManager));