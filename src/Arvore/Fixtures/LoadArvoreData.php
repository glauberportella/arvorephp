<?php
namespace Arvore\Fixtures;

use Arvore\Model\Pessoa;
use Arvore\Project;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\ORM\EntityManager;
use DoctrineExtensions\NestedSet\Config;
use DoctrineExtensions\NestedSet\Manager;
use DoctrineExtensions\NestedSet\Node;
use Exception;

class LoadArvoreData implements FixtureInterface
{
	/**
	 * @var EntityManager $entityManager;
	 */
	private $entityManager;

	/**
	 * @var Manager $nestedSetManager
	 */
	private $nestedSetManager;

	/**
	 * Setup loader
	 */
	public function __construct()
	{
		$this->entityManager = EntityManager::create(Project::$conn, Project::$config);
		$config = new Config($this->entityManager, 'Arvore\Model\Pessoa');
		$this->nestedSetManager = new Manager($config);
	}

	/**
	 * Load data fixture
	 * Create test data for tree structure
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		// Create test tree data
		//							joao
		//			maria							pedro
		//	jose			marta		antonio				renato
		$joao = new Pessoa();
		$joao->setNome('João');

		$maria = new Pessoa();
		$maria->setNome('Maria');

		$pedro = new Pessoa();
		$pedro->setNome('Pedro');

		$jose = new Pessoa();
		$jose->setNome('Jose');

		$marta = new Pessoa();
		$marta->setNome('Marta');

		$antonio = new Pessoa();
		$antonio->setNome('Antonio');

		$renato = new Pessoa();
		$renato->setNome('Renato');

		$em = $this->getEntityManager();
		$em->getConnection()->beginTransaction();
		try {
			// joao is root
			$joaoNode = $this->nestedSetManager->createRoot($joao);
			// adds maria and pedro to joao
			$mariaNode = $joaoNode->addChild($maria);
			$pedroNode = $joaoNode->addChild($pedro);

			// adds jose and marta to maria
			$joseNode = $mariaNode->addChild($jose);
			$martaNode = $mariaNode->addChild($marta);

			// adds antonio and renato to pedro
			$antonioNode = $pedroNode->addChild($antonio);
			$renatoNode = $pedroNode->addChild($renato);
		} catch (Exception $e) {
			$em->close();
    		$em->getConnection()->rollback();
    		throw $e;
		}
	}

	/**
	 * Get entity manager
	 * @return EntityManager
	 */
	protected function getEntityManager()
	{
		return $this->entityManager;
	}
}