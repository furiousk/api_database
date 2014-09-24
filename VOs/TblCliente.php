<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblCliente{

	private $id;
	private $nome;
	private $aniversario;
	private $sexo;
	private $data_cadastro;
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
	public function setAniversario($aniversario){

		$this->aniversario=$aniversario;
	}
	public function getAniversario(){

		return $this->aniversario;
	}
	public function setSexo($sexo){

		$this->sexo=$sexo;
	}
	public function getSexo(){

		return $this->sexo;
	}
	public function setData_cadastro($data_cadastro){

		$this->data_cadastro=$data_cadastro;
	}
	public function getData_cadastro(){

		return $this->data_cadastro;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}

}