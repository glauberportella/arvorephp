<?php
namespace Arvore\Controller;

class ArvoreController extends AbstractNestedSetController
{
	public function indexAction()
	{
		return $this->render('Arvore/index.html.twig');
	}

	/**
	 * Add a new root to the tree
	 * @method POST
	 * @param array|string pessoa POST data for Pessoa model [field => value]
	 */
	public function newRootAction()
	{
		if (!isset($_POST['pessoa']))
			return $this->indexAction();

		$postData = $_POST['pessoa'];

		$pessoa = new \Arvore\Model\Pessoa();
		if (is_array($postData)) {
			$pessoa->setNome($postData['nome'])
				->setCpf($postData['cpf'])
				->setCidade($postData['cidade'])
				->setTelefone($postData['telefone']);
		} else {
			$pessoa->setNome($postData);
		}

		$rootNode = $this->getNestedSetManager()->createRoot($pessoa);

		return $this->render('Arvore/root.html.twig', array('rootNode' => $rootNode));
	}
}