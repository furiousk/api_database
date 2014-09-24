<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblPedido;

class TblPedidoDAO extends MyPDO{

	public function insert( TblPedido $TblPedido ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_pedido` ( `numero_pedido`,`data_pedido`,`status`,`forma_pagamento`,`ativo`,`tbl_cliente_id` ) value ( :numero_pedido,:data_pedido,:status,:forma_pagamento,:ativo,:tbl_cliente_id )' );
			$sttm->bindValue(':numero_pedido', $TblPedido->getNumero_pedido());
			$sttm->bindValue(':data_pedido', $TblPedido->getData_pedido());
			$sttm->bindValue(':status', $TblPedido->getStatus());
			$sttm->bindValue(':forma_pagamento', $TblPedido->getForma_pagamento());
			$sttm->bindValue(':ativo', $TblPedido->getAtivo());
			$sttm->bindValue(':tbl_cliente_id', $TblPedido->getTbl_cliente_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}