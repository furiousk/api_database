<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblEndereco;

class TblEnderecoDAO extends MyPDO{

	public function insert( TblEndereco $TblEndereco ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_endereco` ( `rua`,`numero`,`latitude`,`longitude`,`ativo`,`tbl_bairro_id`,`tbl_cliente_id` ) value ( :rua,:numero,:latitude,:longitude,:ativo,:tbl_bairro_id,:tbl_cliente_id )' );
			$sttm->bindValue(':rua', $TblEndereco->getRua());
			$sttm->bindValue(':numero', $TblEndereco->getNumero());
			$sttm->bindValue(':latitude', $TblEndereco->getLatitude());
			$sttm->bindValue(':longitude', $TblEndereco->getLongitude());
			$sttm->bindValue(':ativo', $TblEndereco->getAtivo());
			$sttm->bindValue(':tbl_bairro_id', $TblEndereco->getTbl_bairro_id());
			$sttm->bindValue(':tbl_cliente_id', $TblEndereco->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}