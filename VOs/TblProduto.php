<?php

/***********************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblProduto{

	private $id;
	private $nome;
	private $image;
	private $preco;
	private $tipo;
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
	public function setImage($image){

		$this->image=$image;
	}
	public function getImage(){

		return $this->image;
	}
	public function setPreco($preco){

		$this->preco=$preco;
	}
	public function getPreco(){

		return $this->preco;
	}
	public function setTipo($tipo){

		$this->tipo=$tipo;
	}
	public function getTipo(){

		return $this->tipo;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}

}