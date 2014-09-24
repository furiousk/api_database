<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblBairro;

class TblBairroDAO extends MyPDO{

	public function insert( TblBairro $TblBairro ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_bairro` ( `nome`,`ativo` ) value ( :nome,:ativo )' );
			$sttm->bindValue(':nome', $TblBairro->getNome());
			$sttm->bindValue(':ativo', $TblBairro->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}