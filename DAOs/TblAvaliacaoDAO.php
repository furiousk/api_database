<?php

/***********************************************
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
	public function update( TblAvaliacao $TblAvaliacao ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_avaliacao` set `rate`=:rate,`comentario`=:comentario,`data_avaliacao`=:data_avaliacao,`ativo`=:ativo,`tbl_produto_id`=:tbl_produto_id where `id`=:id' );
			$sttm->bindValue(':id', $TblAvaliacao->getId());
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
	public function getAll(){

		$sttm = parent::query( 'select `id`,`rate`,`comentario`,`data_avaliacao`,`ativo`,`tbl_produto_id` from `tbl_avaliacao`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblAvaliacao = new TblAvaliacao();
			$TblAvaliacao->setId( $row->id );
			$TblAvaliacao->setRate( $row->rate );
			$TblAvaliacao->setComentario( $row->comentario );
			$TblAvaliacao->setData_avaliacao( $row->data_avaliacao );
			$TblAvaliacao->setAtivo( $row->ativo );
			$TblAvaliacao->setTbl_produto_id( $row->tbl_produto_id );

			$rst[] = $TblAvaliacao;
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
