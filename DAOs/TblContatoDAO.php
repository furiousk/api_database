<?php

/***********************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblContato;

class TblContatoDAO extends MyPDO{

	public function insert( TblContato $TblContato ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_contato` ( `tipo`,`contato`,`ativo`,`tbl_cliente_id` ) value ( :tipo,:contato,:ativo,:tbl_cliente_id )' );
			$sttm->bindValue(':tipo', $TblContato->getTipo());
			$sttm->bindValue(':contato', $TblContato->getContato());
			$sttm->bindValue(':ativo', $TblContato->getAtivo());
			$sttm->bindValue(':tbl_cliente_id', $TblContato->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function update( TblContato $TblContato ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_contato` set `tipo`=:tipo,`contato`=:contato,`ativo`=:ativo,`tbl_cliente_id`=:tbl_cliente_id where `id`=:id' );
			$sttm->bindValue(':id', $TblContato->getId());
			$sttm->bindValue(':tipo', $TblContato->getTipo());
			$sttm->bindValue(':contato', $TblContato->getContato());
			$sttm->bindValue(':ativo', $TblContato->getAtivo());
			$sttm->bindValue(':tbl_cliente_id', $TblContato->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`tipo`,`contato`,`ativo`,`tbl_cliente_id` from `tbl_contato`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblContato = new TblContato();
			$TblContato->setId( $row->id );
			$TblContato->setTipo( $row->tipo );
			$TblContato->setContato( $row->contato );
			$TblContato->setAtivo( $row->ativo );
			$TblContato->setTbl_cliente_id( $row->tbl_cliente_id );

			$rst[] = $TblContato;
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
