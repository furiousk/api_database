<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblLogin;

class TblLoginDAO extends MyPDO{

	public function insert( TblLogin $TblLogin ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_login` ( `user`,`pass`,`ativo`,`tbl_cliente_id` ) value ( :user,:pass,:ativo,:tbl_cliente_id )' );
			$sttm->bindValue(':user', $TblLogin->getUser());
			$sttm->bindValue(':pass', $TblLogin->getPass());
			$sttm->bindValue(':ativo', $TblLogin->getAtivo());
			$sttm->bindValue(':tbl_cliente_id', $TblLogin->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`user`,`pass`,`ativo`,`tbl_cliente_id` from `tbl_login`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblLogin = new TblLogin();
			$TblLogin->setId( $row->id );
			$TblLogin->setUser( $row->user );
			$TblLogin->setPass( $row->pass );
			$TblLogin->setAtivo( $row->ativo );
			$TblLogin->setTbl_cliente_id( $row->tbl_cliente_id );

			$rst[] = $TblLogin;
		}
		return $rst;
	}
}
