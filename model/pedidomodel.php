<?php
class pedidomodel {

    protected $cliente_id;
    protected $idpedido;
    protected $tamanho_id;
    protected $data_hora;
    protected $total;

    public function __construct($idpedido = null, $cliente_id = null, $tamanho_id = null, $data_hora = null, $total = null) {
        $this->idpedido = $idpedido;
        $this->cliente_id = $cliente_id;
        $this->tamanho_id = $tamanho_id;
        $this->data_hora = $data_hora;
        $this->total = $total;
    }

    public function getIdpedido() {
        return $this->idpedido;
    }

    public function setIdpedido($idpedido) {
        $this->idpedido = $idpedido;
    }

    public function getCliente_id() {
        return $this->cliente_id;
    }

    public function setCliente_id($cliente_id) {
        $this->cliente_id = $cliente_id;
    }

    public function getTamanho_id() {
        return $this->tamanho_id;
    }

    public function setTamanho_id($tamanho_id) {
        $this->tamanho_id = $tamanho_id;
    }

    public function getData_hora() {
        return $this->data_hora;
    }

    public function setData_hora($data_hora) {
        $this->data_hora = $data_hora;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setTotal($total) {
        $this->total = $total;
    }
}
