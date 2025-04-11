<?php

class clienteDAO {

    public function cadastraCliente(clientemodel $cliente){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "INSERT INTO cliente (PnomeCli, SnomeCli, EmailCli, SenhaCli, GeneroCli)
                VALUES (:pnome, :snome, :email, :senha, :genero)";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':pnome', $cliente->getPnome());
        $stmt->bindValue(':snome', $cliente->getSnome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':genero', $cliente->getGenero());
        $res = $stmt->execute();
        if($res)
        {
            echo "<script>alert('Cadastro Realizado com sucesso');</script>";
        }
        else{
            echo "<script>alert('Erro: Não foi possível realizar o cadastro');</script>";
        }
        echo "<script>location.href='../controller/processacliente.php?op=Listar';</script>";
    }

    public function listarclientes()
    {
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "SELECT * FROM cliente ORDER BY idcli";
        return $conex->conn->query($sql);
    }

    public function resgataPorID($idcliente){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $sql = "SELECT * FROM cliente WHERE idcli='$idcliente'";
        return $conex->conn->query($sql);
    }

    public function alterarcliente(clientemodel $cliente){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "UPDATE cliente SET PnomeCli =:pnome, SnomeCli =:snome, EmailCli =:email, SenhaCli =:senha, GeneroCli = :genero WHERE idcli = :id";
        $stmt = $conex->conn->prepare($sql);
        $stmt->bindValue(':id', $cliente->getPnome());
        $stmt->bindValue(':pnome', $cliente->getPnome());
        $stmt->bindValue(':snome', $cliente->getSnome());
        $stmt->bindValue(':email', $cliente->getEmail());
        $stmt->bindValue(':senha', $cliente->getSenha());
        $stmt->bindValue(':genero', $cliente->getGenero());
        $res = $stmt->execute();
        if($res)
        {
            echo "<script>alert('Registro Alterado com sucesso');</script>";
        }
        else{
            echo "<script>alert('Erro: Não foi possível alterar o cadastro');</script>";
        }
        echo "<script>location.href='../controller/processacliente.php?op=Listar';</script>";
    }

    public function excluircliente($idcliente){
        include_once 'Conexao.php';
        $conex = new Conexao();
        $conex->fazConexao();
        $sql = "DELETE FROM cliente WHERE idcli='$idcliente'";
        $res = $conex->conn->query($sql);
        if($res)
        {
            echo "<script>alert('Exclusão realizada com sucesso!');</script>";
        }
        else
        {
            echo "<script>alert('Não foi possível excluir o usuário!');</script>";
        }
        echo "<script>location.href='../controller/processacliente.php?op=Listar';</script>";
    }
}
?>