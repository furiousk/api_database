<?php

/************************************************
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
}
