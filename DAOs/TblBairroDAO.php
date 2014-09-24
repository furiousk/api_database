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
	public function getAll(){

		$sttm = parent::query( 'select `id`,`nome`,`ativo` from `tbl_bairro`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblBairro = new TblBairro();
			$TblBairro->setId( $row->id );
			$TblBairro->setNome( $row->nome );
			$TblBairro->setAtivo( $row->ativo );

			$rst[] = $TblBairro;
		}
		return $rst;
	}
}
