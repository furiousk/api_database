<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblCliente;

class TblClienteDAO extends MyPDO{

	public function insert( TblCliente $TblCliente ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_cliente` ( `nome`,`aniversario`,`sexo`,`data_cadastro`,`ativo` ) value ( :nome,:aniversario,:sexo,:data_cadastro,:ativo )' );
			$sttm->bindValue(':nome', $TblCliente->getNome());
			$sttm->bindValue(':aniversario', $TblCliente->getAniversario());
			$sttm->bindValue(':sexo', $TblCliente->getSexo());
			$sttm->bindValue(':data_cadastro', $TblCliente->getData_cadastro());
			$sttm->bindValue(':ativo', $TblCliente->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function update( TblCliente $TblCliente ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_cliente` set `nome`=:nome,`aniversario`=:aniversario,`sexo`=:sexo,`data_cadastro`=:data_cadastro,`ativo`=:ativo where `id`=:id' );
			$sttm->bindValue(':id', $TblCliente->getId());
			$sttm->bindValue(':nome', $TblCliente->getNome());
			$sttm->bindValue(':aniversario', $TblCliente->getAniversario());
			$sttm->bindValue(':sexo', $TblCliente->getSexo());
			$sttm->bindValue(':data_cadastro', $TblCliente->getData_cadastro());
			$sttm->bindValue(':ativo', $TblCliente->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`nome`,`aniversario`,`sexo`,`data_cadastro`,`ativo` from `tbl_cliente`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblCliente = new TblCliente();
			$TblCliente->setId( $row->id );
			$TblCliente->setNome( $row->nome );
			$TblCliente->setAniversario( $row->aniversario );
			$TblCliente->setSexo( $row->sexo );
			$TblCliente->setData_cadastro( $row->data_cadastro );
			$TblCliente->setAtivo( $row->ativo );

			$rst[] = $TblCliente;
		}
		return $rst;
	}
	public function custonQuery( $string ){

		$sttm = parent::query( $string );
		$rst  = Array();

		while( $row = $sttm->fetch( 3 ) ) {


			$rst[] = $row;
		}
		return $rst;
	}
}
