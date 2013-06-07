<?php
namespace Arvore\Controller;

abstract class AbstractController
{
	/**
	 * Controller entity manager
	 * @var \Doctrine\ORM\EntityManager $entityManager
	 */
	private $entityManager;

	/**
	 * Controller template engine
	 * @var \Twig_Environment $templateEngine
	 */
	private $templateEngine;

	public function __construct()
	{
		// initializes Twig template engine
		$loader = new \Twig_Loader_Filesystem(\Arvore\Project::TEMPLATE_PATH);
		$this->templateEngine = new \Twig_Environment($loader, array(
    		'cache' => \Arvore\Project::TEMPLATE_CACHE_PATH,
		));
	}

	/**
	 * Controller dispatch actions
	 */
	public function dispatch()
	{
		$method = !empty($_REQUEST['action']) ? $_REQUEST['action'] : 'index';
		$method .= 'Action';
		return $this->$method();
	}

	/**
	 * Set entity manager for controller
	 * @param \Doctrine\ORM\EntityManager $entityManager
	 */
	public function setEntityManager(\Doctrine\ORM\EntityManager $entityManager)
	{
		$this->entityManager = $entityManager;
	}

	/**
	 * Get controller entity manager
	 * @return \Doctrine\ORM\EntityManager
	 */
	public function getEntityManager()
	{
		return $this->entityManager;
	}

	/**
	 * Get template engine
	 * @return \Twig_Environment
	 */
	public function getTemplateEngine()
	{
		return $this->templateEngine;
	}

	/**
	 * Render a template with template engine
	 * @param string $template The template path
	 * @param array $params Vars to pass to template
	 * @return string Rendered template
	 */
	public function render($template, array $params)
	{
		return $this->templateEngine->render($template, $params);
	}
}