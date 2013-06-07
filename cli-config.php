<?php
require_once "app/bootstrap.php";

use Arvore\Project;

$em = \Doctrine\ORM\EntityManager::create(Project::$conn, Project::$config);

$helperSet = new \Symfony\Component\Console\Helper\HelperSet(array(
    'db' => new \Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper($em->getConnection()),
    'em' => new \Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper($em)
));