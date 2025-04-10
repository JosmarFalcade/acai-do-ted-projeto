<?php
class clientemodel {
    private $idcliente;
    private $pnome;
    private $snome;
    private $email;
    private $senha;
    private $genero;

    // Construtor
    public function __construct($idcliente, $pnome, $snome, $email, $senha, $genero) {
        $this->idcliente = $idcliente;
        $this->pnome = $pnome;
        $this->snome = $snome;
        $this->email = $email;
        $this->senha = $senha;
        $this->genero = $genero;
    }

    // Getters
    public function getId() {
        return $this->idcliente;
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
    public function setId($idcliente) {
        $this->idcliente = $idcliente;
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

    public function cadastrarcliente(clienteModel $cliente)
{
    include_once '../dao/clienteDAO.php';
    $cliente = new clienteDAO();
    return $cliente->cadastracliente($this);
}

public function listarclientes()
{
    include '../dao/clienteDAO.php';
    $dao = new clienteDAO(null);
    return $dao->listarclientes();
}

public function resgatarPorID($idcliente)
{
    include '../dao/clienteDAO.php';
    $model = new clienteDAO(null);
    return $model->resgataPorID($idcliente);
}

        public function alterarcliente(clientemodel $clientemodel)
        {
            include_once '../dao/clientedao.php';
            $cliente = new clientedao();
            $cliente->alterarcliente($this);
        }
        public function excluircliente($idcliente)
        {
            include_once '../dao/clientedao.php';
            $cliente = new clientedao();
            $cliente->excluircliente($idcliente);
        }
}
