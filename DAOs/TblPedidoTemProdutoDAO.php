<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblPedidoTemProduto;

class TblPedidoTemProdutoDAO extends MyPDO{

	public function insert( TblPedidoTemProduto $TblPedidoTemProduto ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_pedido_tem_produto` ( `qntd`,`valor`,`tbl_pedido_id`,`tbl_pedido_tbl_cliente_id`,`tbl_produto_id` ) value ( :qntd,:valor,:tbl_pedido_id,:tbl_pedido_tbl_cliente_id,:tbl_produto_id )' );
			$sttm->bindValue(':qntd', $TblPedidoTemProduto->getQntd());
			$sttm->bindValue(':valor', $TblPedidoTemProduto->getValor());
			$sttm->bindValue(':tbl_pedido_id', $TblPedidoTemProduto->getTbl_pedido_id());
			$sttm->bindValue(':tbl_pedido_tbl_cliente_id', $TblPedidoTemProduto->getTbl_pedido_tbl_cliente_id());
			$sttm->bindValue(':tbl_produto_id', $TblPedidoTemProduto->getTbl_produto_id());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
}