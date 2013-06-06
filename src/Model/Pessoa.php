<?php
namespace Arvore\Model;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use DoctrineExtensions\NestedSet\Node;

/**
 * @Entity
 * @Table(name="pessoa")
 */
class Pessoa implements Node
{
	/**
	 * @Id
	 * @GeneratedValue(strategy="AUTO")
	 * @Column(name="id", type="integer")
	 * 
	 * @var integer $id
	 */
	protected $id;
	
	/**
	 * @Column(name="nome", type="string", length=255, nullable=false)
	 * 
	 * @var string $nome
	 */
	protected $nome;
	
	/**
	 * @Column(name="cpf", type="string", length=15, nullable=true)
	 * 
	 * @var string $cpf
	 */
	protected $cpf;
	
	/**
	 * @Column(name="cidade", type="string", length=50, nullable=true)
	 * 
	 * @var string $cidade
	 */
	protected $cidade;
	
	/**
	 * @Column(name="telefone", type="string", length=20, nullable=true)
	 * 
	 * @var string $telefone
	 */
	protected $telefone;
	
	/** NestedSet specific fields *************************************************/
	/**
	 * @Column(type="integer")
	 */
	protected $root;

	/**
     * @Column(type="integer")
     */
    protected $lft;

    /**
     * @Column(type="integer")
     */
    protected $rgt;
    /** End NestedSet specific fields *********************************************/

	/**
	 * Get ID
	 * @return integer
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Get nome
	 * @return string
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * Sets nome
	 * @param string $nome
	 * @return \Arvore\Model\Pessoa
	 */
	public function setNome($nome) {
		$this->nome = $nome;
		return $this;
	}

	/**
	 * Get CPF
	 * @return string
	 */
	public function getCpf() {
		return $this->cpf;
	}

	/**
	 * Sets CPF
	 * @param string $cpf
	 * @return \Arvore\Model\Pessoa
	 */
	public function setCpf($cpf) {
		$this->cpf = $cpf;
		return $this;
	}

	/**
	 * Get Cidade
	 * @return string
	 */
	public function getCidade() {
		return $this->cidade;
	}

	/**
	 * Set cidade
	 * @param string $cidade
	 * @return \Arvore\Model\Pessoa
	 */
	public function setCidade($cidade) {
		$this->cidade = $cidade;
		return $this;
	}

	/**
	 * Get telefone
	 * @return string
	 */
	public function getTelefone() {
		return $this->telefone;
	}

	/**
	 * Set telefone
	 * @param string $telefone
	 * @return \Arvore\Model\Pessoa
	 */
	public function setTelefone($telefone) {
		$this->telefone = $telefone;
		return $this;
	}

	public function __toString()
	{
		return $this->nome;
	}

	/** NestedSet specific accessors ******************************************************/
	public function getRootValue() { return $this->root; }
	public function setRootValue($root) { $this->root = $root; }
	public function getLeftValue() { return $this->lft; }
    public function setLeftValue($lft) { $this->lft = $lft; }
    public function getRightValue() { return $this->rgt; }
    public function setRightValue($rgt) { $this->rgt = $rgt; }
}