<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblAvaliacao;

class TblAvaliacaoDAO extends MyPDO{

	public function insert( TblAvaliacao $TblAvaliacao ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_avaliacao` ( `rate`,`comentario`,`data_avaliacao`,`ativo`,`tbl_produto_id` ) value ( :rate,:comentario,:data_avaliacao,:ativo,:tbl_produto_id )' );
			$sttm->bindValue(':rate', $TblAvaliacao->getRate());
			$sttm->bindValue(':comentario', $TblAvaliacao->getComentario());
			$sttm->bindValue(':data_avaliacao', $TblAvaliacao->getData_avaliacao());
			$sttm->bindValue(':ativo', $TblAvaliacao->getAtivo());
			$sttm->bindValue(':tbl_produto_id', $TblAvaliacao->getTbl_produto_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}