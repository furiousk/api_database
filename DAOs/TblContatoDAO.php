<?php

/************************************************
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
}