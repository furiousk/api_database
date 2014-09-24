<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblCliente;

class TblClienteDAO extends MyPDO{

	public function insert( TblCliente $TblCliente ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_cliente` ( `nome`,`aniversario`,`sexo`,`data_cadastro`,`ativo` ) value ( :nome,:aniversario,:sexo,:data_cadastro,:ativo )' );
			$sttm->bindValue(':nome', $TblCliente->getNome());
			$sttm->bindValue(':aniversario', $TblCliente->getAniversario());
			$sttm->bindValue(':sexo', $TblCliente->getSexo());
			$sttm->bindValue(':data_cadastro', $TblCliente->getData_cadastro());
			$sttm->bindValue(':ativo', $TblCliente->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}