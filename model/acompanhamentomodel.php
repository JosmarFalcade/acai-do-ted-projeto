<?php

class Acompanhamentomodel {
    protected $idacompanhamento;
    protected $nomeacompanhamento;
    protected $precoacompanhamento;

    public function __construct($idacompanhamento = null, $nomeacompanhamento = null, $precoacompanhamento = null) {
        $this->idacompanhamento = $idacompanhamento;
        $this->nomeacompanhamento = $nomeacompanhamento;
        $this->precoacompanhamento = $precoacompanhamento;
    }

    public function getIdacompanhamento() {
        return $this->idacompanhamento;
    }

    public function setIdacompanhamento($idacompanhamento) {
        $this->idacompanhamento = $idacompanhamento;
    }

    public function getNomeacompanhamento() {
        return $this->nomeacompanhamento;
    }

    public function setNomeacompanhamento($nomeacompanhamento) {
        $this->nomeacompanhamento = $nomeacompanhamento;
    }

    public function getPrecoacompanhamento() {
        return $this->precoacompanhamento;
    }

    public function setPrecoacompanhamento($precoacompanhamento) {
        $this->precoacompanhamento = $precoacompanhamento;
    }
}
