<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblContato{

	private $id;
	private $tipo;
	private $contato;
	private $ativo;
	private $tbl_cliente_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setTipo($tipo){

		$this->tipo=$tipo;
	}
	public function getTipo(){

		return $this->tipo;
	}
	public function setContato($contato){

		$this->contato=$contato;
	}
	public function getContato(){

		return $this->contato;
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