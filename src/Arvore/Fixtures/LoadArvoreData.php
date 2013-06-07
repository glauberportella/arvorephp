<?php
namespace Arvore\Fixtures;

use Arvore\Model\Pessoa;
use Arvore\Project;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use DoctrineExtensions\NestedSet\Config;
use DoctrineExtensions\NestedSet\Manager;

class LoadArvoreData implements FixtureInterface
{
	/**
	 * Load data fixture
	 * Create test data for tree structure
	 *
	 * @param ObjectManager $manager
	 */
	public function load(ObjectManager $manager)
	{
		// NestedSet Manager
		$nsm = new Manager(new Config($manager, 'Arvore\Model\Pessoa'));
		
		// Create test tree data
		//							joao
		//			maria							pedro
		//	jose			marta		antonio				renato
		$joao = new Pessoa();
		$joao->setNome('Joao');
//		$manager->persist($joao);

		$maria = new Pessoa();
		$maria->setNome('Maria');
//		$manager->persist($maria);

		$pedro = new Pessoa();
		$pedro->setNome('Pedro');
//		$manager->persist($pedro);

		$jose = new Pessoa();
		$jose->setNome('Jose');
//		$manager->persist($jose);

		$marta = new Pessoa();
		$marta->setNome('Marta');
//		$manager->persist($marta);

		$antonio = new Pessoa();
		$antonio->setNome('Antonio');
//		$manager->persist($antonio);

		$renato = new Pessoa();
		$renato->setNome('Renato');
//		$manager->persist($renato);
//
//		$manager->flush();
		
		// joao is root
		$joaoNode = $nsm->createRoot($joao);
		// adds maria and pedro to joao
		$mariaNode = $joaoNode->addChild($maria);
		$pedroNode = $joaoNode->addChild($pedro);

		// adds jose and marta to maria
		$joseNode = $mariaNode->addChild($jose);
		$martaNode = $mariaNode->addChild($marta);

		// adds antonio and renato to pedro
		$antonioNode = $pedroNode->addChild($antonio);
		$renatoNode = $pedroNode->addChild($renato);			
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