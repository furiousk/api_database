<?php

/************************************************
*        Ferramentas DevPHP Bruno Alves        *
************************************************/

namespace DAOs;

use Classes\DB\MyPDO;
use VOs\TblProduto;

class TblProdutoDAO extends MyPDO{

	public function insert( TblProduto $TblProduto ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'insert into `tbl_produto` ( `nome`,`image`,`preco`,`tipo`,`ativo` ) value ( :nome,:image,:preco,:tipo,:ativo )' );
			$sttm->bindValue(':id', $TblProduto->getId());
			$sttm->bindValue(':nome', $TblProduto->getNome());
			$sttm->bindValue(':image', $TblProduto->getImage());
			$sttm->bindValue(':preco', $TblProduto->getPreco());
			$sttm->bindValue(':tipo', $TblProduto->getTipo());
			$sttm->bindValue(':ativo', $TblProduto->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function update( TblProduto $TblProduto ){

		parent::beginTransaction();
		try {

			$sttm = parent::prepare( 'update `tbl_produto` set `nome`=:nome,`image`=:image,`preco`=:preco,`tipo`=:tipo,`ativo`=:ativo where `id`=:id' );
			$sttm->bindValue(':id', $TblProduto->getId());
			$sttm->bindValue(':nome', $TblProduto->getNome());
			$sttm->bindValue(':image', $TblProduto->getImage());
			$sttm->bindValue(':preco', $TblProduto->getPreco());
			$sttm->bindValue(':tipo', $TblProduto->getTipo());
			$sttm->bindValue(':ativo', $TblProduto->getAtivo());
			$sttm->execute();
			parent::commit();

		} catch(Exception $e) {

			parent::rollBack();
		}
	}
	public function getAll(){

		$sttm = parent::query( 'select `id`,`nome`,`image`,`preco`,`tipo`,`ativo` from `tbl_produto`' );
		$rst  = Array();

		while( $row = $sttm->fetch( 5 ) ) {

			$TblProduto = new TblProduto();
			$TblProduto->setId( $row->id );
			$TblProduto->setNome( $row->nome );
			$TblProduto->setImage( $row->image );
			$TblProduto->setPreco( $row->preco );
			$TblProduto->setTipo( $row->tipo );
			$TblProduto->setAtivo( $row->ativo );

			$rst[] = $TblProduto;
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
