<?php

    class clientecontroller{
        public static function cadastrarCliente($PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli)
        {
            include '../model/clientemodel.php';
            $cliente = new clientemodel(null, $PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli);
            $cliente->cadastrarCliente($cliente);
        }

        public static function listarClientes()
        {
            include '../model/clientemodel.php';
            $model = new clientemodel(null,null,null,null,null,null);
            return $model ->listarClientes();
        }

        public static function resgatarPorID($idcliente){
            include '../model/clientemodel.php';
            $model = new clientemodel(null,null,null,null,null,null);
            return $model ->resgatarPorID($idcliente);
        }

        public static function alterarCliente($PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli, $idcliente)
        {
            include '../model/clientemodel.php';
            $cliente = new clientemodel($idcliente, $PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli);
            $cliente->alterarCliente($cliente);
        }

        public static function excluirCliente($idcliente)
        {
            include '../model/clientemodel.php';
            $cliente = new clientemodel(null,null,null,null,null,null);
            $cliente ->excluirCliente($idcliente);
        }
    }
    ?>
