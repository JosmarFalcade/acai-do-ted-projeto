<?php
class pedidomodel {

    protected $idtamanho;
    protected $nome;
    protected $volume_ml;
    protected $preco;

    public function __construct($idtamanho = null, $nome = null, $volume_ml = null, $preco = null) {
        $this->idtamanho = $idtamanho;
        $this->nome = $nome;
        $this->volume_ml = $volume_ml;
        $this->preco = $preco;
    }

    public function getIdtamanho() {
        return $this->idtamanho;
    }

    public function setIdtamanho($idtamanho) {
        $this->idtamanho = $idtamanho;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getVolume_ml() {
        return $this->volume_ml;
    }

    public function setVolume_ml($volume_ml) {
        $this->volume_ml = $volume_ml;
    }

    public function getPreco() {
        return $this->preco;
    }

    public function setPreco($preco) {
        $this->preco = $preco;
    }
}
