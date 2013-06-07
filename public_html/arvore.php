<?php
require_once __DIR__.'/../app/bootstrap.php';

use Arvore\Project;
use Arvore\Controller\ArvoreController;
use Doctrine\ORM\EntityManager;

$entityManager = EntityManager::create(Project::$conn, Project::$config);
$controller = new ArvoreController();
$controller->setEntityManager($entityManager);
echo $controller->dispatch();