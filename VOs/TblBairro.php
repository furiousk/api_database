<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblBairro{

	private $id;
	private $nome;
	private $ativo;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setNome($nome){

		$this->nome=$nome;
	}
	public function getNome(){

		return $this->nome;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}

}