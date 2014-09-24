<?php

define( 'WWW_ROOT', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once( WWW_ROOT . DS . "autoload.php" );

$INI_PRO = WWW_ROOT . DS . "Config" . DS . "config.ini";//<-config presente no projeto(Use este)
$ini_dev = "../config/config.ini";//<-config do Bruno desenvolvedor

/*Mapeamento automático*/
/*
$mapp = new Classes\Sources\Mapping( $ini_dev );
$mapp->setFolderVos("VOs");//<-Os arquivos presentes nesta pasta foram gerados por um banco de teste (Apague-os)
$mapp->setFolderDao("DAOs");<-Os arquivos presentes nesta pasta foram gerados por um banco de teste (Apague-os)
$mapp->mappEntity();
/*/
/*Mapeamento automático*/

//*
$clidao  = new DAOs\TblClienteDAO( $ini_dev );
$cliente = new VOs\TblCliente();

$c = $clidao->getAll();

echo $c[1]->getNome();
/*/

/*
$cliente->setNome("Carol Mendes");
$cliente->setSexo("FEMININO");
$cliente->setData_cadastro("2014-09-23");
$cliente->setAniversario("2006-10-10");
$cliente->setAtivo("1");
/*/
//$clidao->insert( $cliente );