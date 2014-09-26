<?php

/***********************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblIngrediente;

class TblIngredienteDAO extends MyPDO{

	public function insert( TblIngrediente $TblIngrediente ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_ingrediente` ( `receita_produto_id`,`ingrediente_produto_id` ) value ( :receita_produto_id,:ingrediente_produto_id )' );
			$sttm->bindValue(':receita_produto_id', $TblIngrediente->getReceita_produto_id());
			$sttm->bindValue(':ingrediente_produto_id', $TblIngrediente->getIngrediente_produto_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function update( TblIngrediente $TblIngrediente ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_ingrediente` set `receita_produto_id`=:receita_produto_id,`ingrediente_produto_id`=:ingrediente_produto_id where `id`=:id' );
			$sttm->bindValue(':id', $TblIngrediente->getId(),parent::PARAM_INT);
			$sttm->bindValue(':receita_produto_id', $TblIngrediente->getReceita_produto_id());
			$sttm->bindValue(':ingrediente_produto_id', $TblIngrediente->getIngrediente_produto_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getById( $id ){

		$sttm = parent::prepare( 'select `id`,`receita_produto_id`,`ingrediente_produto_id` from `tbl_ingrediente` where `id`=:id' );
		$sttm->bindValue(':id', $id, parent::PARAM_INT);
		$sttm->execute();
		$TblIngrediente = new TblIngrediente();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblIngrediente->setId( $row->id );
			$TblIngrediente->setReceita_produto_id( $row->receita_produto_id );
			$TblIngrediente->setIngrediente_produto_id( $row->ingrediente_produto_id );
		}

		return $TblIngrediente;
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`receita_produto_id`,`ingrediente_produto_id` from `tbl_ingrediente`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblIngrediente = new TblIngrediente();
			$TblIngrediente->setId( $row->id );
			$TblIngrediente->setReceita_produto_id( $row->receita_produto_id );
			$TblIngrediente->setIngrediente_produto_id( $row->ingrediente_produto_id );

			$rst[] = $TblIngrediente;
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
