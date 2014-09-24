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
}