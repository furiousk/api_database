<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblLogin{

	private $id;
	private $user;
	private $pass;
	private $ativo;
	private $tbl_cliente_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setUser($user){

		$this->user=$user;
	}
	public function getUser(){

		return $this->user;
	}
	public function setPass($pass){

		$this->pass=$pass;
	}
	public function getPass(){

		return $this->pass;
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