<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblEndereco;

class TblEnderecoDAO extends MyPDO{

	public function insert( TblEndereco $TblEndereco ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_endereco` ( `rua`,`numero`,`latitude`,`longitude`,`ativo`,`tbl_bairro_id`,`tbl_cliente_id` ) value ( :rua,:numero,:latitude,:longitude,:ativo,:tbl_bairro_id,:tbl_cliente_id )' );
			$sttm->bindValue(':id', $TblEndereco->getId());
			$sttm->bindValue(':rua', $TblEndereco->getRua());
			$sttm->bindValue(':numero', $TblEndereco->getNumero());
			$sttm->bindValue(':latitude', $TblEndereco->getLatitude());
			$sttm->bindValue(':longitude', $TblEndereco->getLongitude());
			$sttm->bindValue(':ativo', $TblEndereco->getAtivo());
			$sttm->bindValue(':tbl_bairro_id', $TblEndereco->getTbl_bairro_id());
			$sttm->bindValue(':tbl_cliente_id', $TblEndereco->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function update( TblEndereco $TblEndereco ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_endereco` set `rua`=:rua,`numero`=:numero,`latitude`=:latitude,`longitude`=:longitude,`ativo`=:ativo,`tbl_bairro_id`=:tbl_bairro_id,`tbl_cliente_id`=:tbl_cliente_id where `id`=:id' );
			$sttm->bindValue(':id', $TblEndereco->getId());
			$sttm->bindValue(':rua', $TblEndereco->getRua());
			$sttm->bindValue(':numero', $TblEndereco->getNumero());
			$sttm->bindValue(':latitude', $TblEndereco->getLatitude());
			$sttm->bindValue(':longitude', $TblEndereco->getLongitude());
			$sttm->bindValue(':ativo', $TblEndereco->getAtivo());
			$sttm->bindValue(':tbl_bairro_id', $TblEndereco->getTbl_bairro_id());
			$sttm->bindValue(':tbl_cliente_id', $TblEndereco->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`rua`,`numero`,`latitude`,`longitude`,`ativo`,`tbl_bairro_id`,`tbl_cliente_id` from `tbl_endereco`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblEndereco = new TblEndereco();
			$TblEndereco->setId( $row->id );
			$TblEndereco->setRua( $row->rua );
			$TblEndereco->setNumero( $row->numero );
			$TblEndereco->setLatitude( $row->latitude );
			$TblEndereco->setLongitude( $row->longitude );
			$TblEndereco->setAtivo( $row->ativo );
			$TblEndereco->setTbl_bairro_id( $row->tbl_bairro_id );
			$TblEndereco->setTbl_cliente_id( $row->tbl_cliente_id );

			$rst[] = $TblEndereco;
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
