<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblPedidoTemProduto{

	private $id;
	private $qntd;
	private $valor;
	private $tbl_pedido_id;
	private $tbl_pedido_tbl_cliente_id;
	private $tbl_produto_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setQntd($qntd){

		$this->qntd=$qntd;
	}
	public function getQntd(){

		return $this->qntd;
	}
	public function setValor($valor){

		$this->valor=$valor;
	}
	public function getValor(){

		return $this->valor;
	}
	public function setTbl_pedido_id($tbl_pedido_id){

		$this->tbl_pedido_id=$tbl_pedido_id;
	}
	public function getTbl_pedido_id(){

		return $this->tbl_pedido_id;
	}
	public function setTbl_pedido_tbl_cliente_id($tbl_pedido_tbl_cliente_id){

		$this->tbl_pedido_tbl_cliente_id=$tbl_pedido_tbl_cliente_id;
	}
	public function getTbl_pedido_tbl_cliente_id(){

		return $this->tbl_pedido_tbl_cliente_id;
	}
	public function setTbl_produto_id($tbl_produto_id){

		$this->tbl_produto_id=$tbl_produto_id;
	}
	public function getTbl_produto_id(){

		return $this->tbl_produto_id;
	}

}