<?php

class itenspedidomodel {
    protected $iditenspedido;
    protected $pedido_id;
    protected $acompanhamento_id;

    public function __construct($iditenspedido = null, $pedido_id = null, $acompanhamento_id = null) {
        $this->iditenspedido = $iditenspedido;
        $this->pedido_id = $pedido_id;
        $this->acompanhamento_id = $acompanhamento_id;
    }

    public function getIditenspedido() {
        return $this->iditenspedido;
    }

    public function setIditenspedido($iditenspedido) {
        $this->iditenspedido = $iditenspedido;
    }

    public function getPedido_id() {
        return $this->pedido_id;
    }

    public function setPedido_id($pedido_id) {
        $this->pedido_id = $pedido_id;
    }

    public function getAcompanhamento_id() {
        return $this->acompanhamento_id;
    }

    public function setAcompanhamento_id($acompanhamento_id) {
        $this->acompanhamento_id = $acompanhamento_id;
    }
}
