<?php

/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/

define( 'WWW_ROOT', dirname(__FILE__) );
define( 'DS', DIRECTORY_SEPARATOR );

function carrega_class( $class ){
 
    $class_path = WWW_ROOT . DS . str_replace('\\', DS, $class).".php";
    
    if( !file_exists( $class_path ) ){
        
        throw new Exception( "Arquivo {$class_path} não encontrado!" );
    }
    require_once( $class_path );
}

spl_autoload_register("carrega_class");