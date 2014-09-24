<?php

define( 'WWW_ROOT', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );

require_once( WWW_ROOT . DS . "autoload.php" );

$INI_PRO = WWW_ROOT . DS . "Config" . DS . "config.ini";
$ini_dev = "../config/config.ini";

/*Mapeamento automático*/

$mapp = new Classes\Sources\Mapping( $ini_dev );
$mapp->setFolderVos("VOs");
$mapp->setFolderDao("DAOs");
$mapp->mappEntity();
/*/
/*Mapeamento automático*/

/*
$clidao  = new DAOs\TblClienteDAO( $INI );
$cliente = new VOs\TblCliente();

$cliente->setNome("Carol Mendes");
$cliente->setSexo("FEMININO");
$cliente->setData_cadastro("2014-09-23");
$cliente->setAniversario("2006-10-10");
$cliente->setAtivo("1");
*/
//$clidao->insert( $cliente );