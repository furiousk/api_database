<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace VOs;

class TblEndereco{

	private $id;
	private $rua;
	private $numero;
	private $latitude;
	private $longitude;
	private $ativo;
	private $tbl_bairro_id;
	private $tbl_cliente_id;

	public function setId($id){

		$this->id=$id;
	}
	public function getId(){

		return $this->id;
	}
	public function setRua($rua){

		$this->rua=$rua;
	}
	public function getRua(){

		return $this->rua;
	}
	public function setNumero($numero){

		$this->numero=$numero;
	}
	public function getNumero(){

		return $this->numero;
	}
	public function setLatitude($latitude){

		$this->latitude=$latitude;
	}
	public function getLatitude(){

		return $this->latitude;
	}
	public function setLongitude($longitude){

		$this->longitude=$longitude;
	}
	public function getLongitude(){

		return $this->longitude;
	}
	public function setAtivo($ativo){

		$this->ativo=$ativo;
	}
	public function getAtivo(){

		return $this->ativo;
	}
	public function setTbl_bairro_id($tbl_bairro_id){

		$this->tbl_bairro_id=$tbl_bairro_id;
	}
	public function getTbl_bairro_id(){

		return $this->tbl_bairro_id;
	}
	public function setTbl_cliente_id($tbl_cliente_id){

		$this->tbl_cliente_id=$tbl_cliente_id;
	}
	public function getTbl_cliente_id(){

		return $this->tbl_cliente_id;
	}

}