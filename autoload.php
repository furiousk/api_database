<?php

/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/

function carrega_class( $class ){
 
    $class_path = WWW_ROOT . DS . str_replace('\\', DS, $class).".php";
    
    if( !file_exists( $class_path ) ){
        
        throw new Exception( "Arquivo {$class_path} não encontrado!" );
    }
    require_once( $class_path );
}

spl_autoload_register("carrega_class");