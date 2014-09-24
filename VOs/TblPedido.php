<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblPedido{

	private $id;
	private $numero_pedido;
	private $data_pedido;
	private $status;
	private $forma_pagamento;
	private $ativo;
	private $tbl_cliente_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setNumero_pedido($numero_pedido){

		$this->numero_pedido=$numero_pedido;
	}
	public function getNumero_pedido(){

		return $this->numero_pedido;
	}
	public function setData_pedido($data_pedido){

		$this->data_pedido=$data_pedido;
	}
	public function getData_pedido(){

		return $this->data_pedido;
	}
	public function setStatus($status){

		$this->status=$status;
	}
	public function getStatus(){

		return $this->status;
	}
	public function setForma_pagamento($forma_pagamento){

		$this->forma_pagamento=$forma_pagamento;
	}
	public function getForma_pagamento(){

		return $this->forma_pagamento;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}
	public function setTbl_cliente_id($tbl_cliente_id){

		$this->tbl_cliente_id=$tbl_cliente_id;
	}
	public function getTbl_cliente_id(){

		return $this->tbl_cliente_id;
	}

}