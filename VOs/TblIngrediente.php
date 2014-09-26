<?php

/***********************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblIngrediente{

	private $id;
	private $receita_produto_id;
	private $ingrediente_produto_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setReceita_produto_id($receita_produto_id){

		$this->receita_produto_id=$receita_produto_id;
	}
	public function getReceita_produto_id(){

		return $this->receita_produto_id;
	}
	public function setIngrediente_produto_id($ingrediente_produto_id){

		$this->ingrediente_produto_id=$ingrediente_produto_id;
	}
	public function getIngrediente_produto_id(){

		return $this->ingrediente_produto_id;
	}

}