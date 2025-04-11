<?php
class produtomodel {
    private $idproduto;
    private $pnome;
    private $snome;
    private $email;
    private $senha;
    private $genero;

    // Construtor
    public function __construct($idproduto, $pnome, $snome, $email, $senha, $genero) {
        $this->idproduto = $idproduto;
        $this->pnome = $pnome;
        $this->snome = $snome;
        $this->email = $email;
        $this->senha = $senha;
        $this->genero = $genero;
    }

    // Getters
    public function getId() {
        return $this->idproduto;
    }

    public function getPnome() {
        return $this->pnome;
    }

    public function getSnome() {
        return $this->snome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getGenero() {
        return $this->genero;
    }

    // Setters
    public function setId($idproduto) {
        $this->idproduto = $idproduto;
    }

    public function setPnome($pnome) {
        $this->pnome = $pnome;
    }

    public function setSnome($snome) {
        $this->snome = $snome;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setGenero($genero) {
        $this->genero = $genero;
    }

    public function cadastrarproduto(produtoModel $produto)
{
    include_once '../dao/produtoDAO.php';
    $produto = new produtoDAO();
    return $produto->cadastraproduto($this);
}

public function listarprodutos()
{
    include '../dao/produtoDAO.php';
    $dao = new produtoDAO(null);
    return $dao->listarprodutos();
}

public function resgatarPorID($idproduto)
{
    include '../dao/produtoDAO.php';
    $model = new produtoDAO(null);
    return $model->resgataPorID($idproduto);
}

        public function alterarproduto(produtomodel $produtomodel)
        {
            include_once '../dao/produtodao.php';
            $produto = new produtodao();
            $produto->alterarproduto($this);
        }
        public function excluirproduto($idproduto)
        {
            include_once '../dao/produtodao.php';
            $produto = new produtodao();
            $produto->excluirproduto($idproduto);
        }
}
