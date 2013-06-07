<?php
namespace Arvore\Controller;

class AbstractNestedSetController extends AbstractController
{
	private $nestedSetManager;

	/**
	 * @override
	 */
	public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
	{
		parent::setEntityManager($entityManager);

		$config = new \DoctrineExtensions\NestedSet\Config($this->getEntityManager(), 'Arvore\Model\Pessoa');

		$this->nestedSetManager = new \DoctrineExtensions\NestedSet\Manager($config);
	}

	/**
	 * Get nested set manager
	 * @return \DoctrineExtensions\NestedSet\Manager
	 */
	public function getNestedSetManager()
	{
		return $this->nestedSetManager;
	}

	/**
	 * Set nested set manager
	 * @param \DoctrineExtensions\NestedSet\Manager $manager
	 */
	public function setNestedSetManager(\DoctrineExtensions\NestedSet\Manager $manager)
	{
		$this->nestedSetManager = $manager;
	}
}