<?php

/***********************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblAvaliacao{

	private $id;
	private $rate;
	private $comentario;
	private $data_avaliacao;
	private $ativo;
	private $tbl_produto_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setRate($rate){

		$this->rate=$rate;
	}
	public function getRate(){

		return $this->rate;
	}
	public function setComentario($comentario){

		$this->comentario=$comentario;
	}
	public function getComentario(){

		return $this->comentario;
	}
	public function setData_avaliacao($data_avaliacao){

		$this->data_avaliacao=$data_avaliacao;
	}
	public function getData_avaliacao(){

		return $this->data_avaliacao;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}
	public function setTbl_produto_id($tbl_produto_id){

		$this->tbl_produto_id=$tbl_produto_id;
	}
	public function getTbl_produto_id(){

		return $this->tbl_produto_id;
	}

}