<?php
/**
 * Fixture load for Arvore project
 * In project root use: php fixtures.php
 * It will load test data on database to test project
 *
 * @author Glauber Portella <glauberportella@gmail.com>
 */

require_once 'bootstrap.php';

use Arvore\Project;
use Arvore\Fixtures\LoadArvoreData;
use Doctrine\Common\DataFixtures\Executor\ORMExecutor;
use Doctrine\Common\DataFixtures\Loader;
use Doctrine\Common\DataFixtures\Purger\ORMPurger;
use Doctrine\ORM\EntityManager;

$loader = new Loader();
$loader->loadFromDirectory(__DIR__.'/../src/Arvore/Fixtures');

$em = EntityManager::create(Project::$conn, Project::$config);
$purger = new ORMPurger();
$executor = new ORMExecutor($em, $purger);
$executor->execute($loader->getFixtures());