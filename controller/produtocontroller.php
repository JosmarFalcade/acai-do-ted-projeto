<?php

    class produtocontroller{
        public static function cadastrarproduto($PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli)
        {
            include '../model/produtomodel.php';
            $produto = new produtomodel(null, $PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli);
            $produto->cadastrarproduto($produto);
        }

        public static function listarprodutos()
        {
            include '../model/produtomodel.php';
            $model = new produtomodel(null,null,null,null,null,null);
            return $model ->listarprodutos();
        }

        public static function resgatarPorID($idproduto){
            include '../model/produtomodel.php';
            $model = new produtomodel(null,null,null,null,null,null);
            return $model ->resgatarPorID($idproduto);
        }

        public static function alterarproduto($PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli, $idproduto)
        {
            include '../model/produtomodel.php';
            $produto = new produtomodel($idproduto, $PnomeCli, $SnomeCli, $EmailCli, $SenhaCli, $GeneroCli);
            $produto->alterarproduto($produto);
        }

        public static function excluirproduto($idproduto)
        {
            include '../model/produtomodel.php';
            $produto = new produtomodel(null,null,null,null,null,null);
            $produto ->excluirproduto($idproduto);
        }
    }
    ?>
