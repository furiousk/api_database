<?php
/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/
namespace Classes\Sources;

class TrataDados{
    //===========================SECURIDADOS================================
    function definirCharset($array){
    //esta função detecta e codifica os dados segundo o banco de dados
    //porem, este array deve ser simples o mesmo definida para o metodo de gravação. ex. $array['field']='valor';
        if( !empty( $array ) ){
            foreach( $array as $i => $v ){
                $rows[$i]=(mb_detect_encoding($v)=='UTF-8')?utf8_decode($v):$v;
            }
            return $rows;
        }
    }
    function definirCharsetEnc($array){
    //esta função detecta e codifica os dados segundo o banco de dados
    //porem, este array deve ser simples o mesmo definida para o metodo de gravação. ex. $array['field']='valor';
        if( !empty( $array ) ){
            foreach( $array as $i => $v ){
                $rows[$i] = utf8_encode(( utf8_decode($v) == $v ) ? utf8_encode($v) : $v);
            }
            return $rows;
        }
    }    
    function definirCharsetUm($string){

        if(!empty($string)){
            $string = (mb_detect_encoding($string)=='UTF-8') ? $string :utf8_encode($string);
        }
        return $string;
        
    }
    //============================by FURIOUS================================
}