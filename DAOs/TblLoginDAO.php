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
}