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
	public function update( TblPedidoTemProduto $TblPedidoTemProduto ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_pedido_tem_produto` set `qntd`=:qntd,`valor`=:valor,`tbl_pedido_id`=:tbl_pedido_id,`tbl_pedido_tbl_cliente_id`=:tbl_pedido_tbl_cliente_id,`tbl_produto_id`=:tbl_produto_id where `id`=:id' );
			$sttm->bindValue(':id', $TblPedidoTemProduto->getId());
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
	public function getAll(){

		$sttm = parent::query( 'select `id`,`qntd`,`valor`,`tbl_pedido_id`,`tbl_pedido_tbl_cliente_id`,`tbl_produto_id` from `tbl_pedido_tem_produto`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblPedidoTemProduto = new TblPedidoTemProduto();
			$TblPedidoTemProduto->setId( $row->id );
			$TblPedidoTemProduto->setQntd( $row->qntd );
			$TblPedidoTemProduto->setValor( $row->valor );
			$TblPedidoTemProduto->setTbl_pedido_id( $row->tbl_pedido_id );
			$TblPedidoTemProduto->setTbl_pedido_tbl_cliente_id( $row->tbl_pedido_tbl_cliente_id );
			$TblPedidoTemProduto->setTbl_produto_id( $row->tbl_produto_id );

			$rst[] = $TblPedidoTemProduto;
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
