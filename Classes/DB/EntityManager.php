<?php

/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/

namespace Classes\DB;

class EntityManager extends MyPDO{

    public $statuscodPDO  = 0;  //Opcional se desejar pegar a string de retorno do PDO
    public $statusinfoPDO = ''; //Opcional se desejar pegar o código de retorno do PDO
    public $idgravado;          //Opcional se desejar pegar o LAST ID após insert

    public function exibeTituloCampos( $tabela ){
        
       $result = parent::prepare($statement);
    }
    
    public function exibeTabela( $tabela, $mode=3, $condicao="", $order="" ){
        
        $drtrateiro = new \Classes\Sources\TrataDados();
        
        /* O mode da função define a saida gerado pela PDO.
         * Por padrão a função vem sem clausula e com o mode FETCH_NUM.
         * ex.: $obj=exibeTabela( "nomedatabela",mode,"clausula where completa" );
         * tipos de mode: 
         * PDO::FETCH_OBJ OU 1   => RETORNA OBJETO.
         * PDO::FETCH_ASSOC OU 2 => RETORNA ARRAY STRING.
         * PDO::FETCH_NUM OU 3   => RETORNA ARRAY NUMERICO.
         * *****************************
         * Fragoso 20/03/2013  -> edev.
         *******************************/
        
        $campos = "";
        $fields = parent::query("show fields from `".$tabela."`");
        
        foreach ($fields as $v){
            
            if( $campos == "" ){
                
                $campos = "`".$v[0]."`";
            }else{
                
                $campos .= ",`".$v[0]."`";
            }
        }
        
        $query="select $campos from `".$tabela."` ".$condicao." ".$order;
        $result = parent::query( $query );
        $rows="";
        
        if( $result ){
            
            while( $row = $result->fetch( $mode ) ){
                
               $rows[] = $drtrateiro->definirCharsetEnc( $row ); 

            }
        }
        return $rows;
    }
    
    public function custonQuery( $statement, $mode=3 ){
        
        $drtrateiro = new \Classes\Sources\TrataDados();
        
        $query = parent::query( $statement );

        $rows  = "";
        if( $query ){
            
            while( $row = $query->fetch( $mode ) ){
                
                $rows[] = $drtrateiro->definirCharsetEnc( $row );

            }
        }
        return $rows;
    }
    
    public function gravarDados($tabela, $post){
        
        $drtrateiro = new \Classes\Sources\TrataDados();
        
        $post       = $drtrateiro->definirCharset($post);
        
        $fields     = parent::query( "show fields from `".$tabela."`" );
        
        $campos     = "";
        $marque     = "";
        
        foreach( $fields as $v ){
            
            if($v[5]=="auto_increment"){}else{
                
                if( $campos == "" && $marque == "" ){

                    $campos = "`".$v[0]."`";
                    $marque = ":".$v[0];

                }else{

                    $campos .= ",`".$v[0]."`";
                    $marque .= ",:".$v[0];
                }
            }
        }
        
        $query  = "insert into `".$tabela."` ( $campos ) value ( $marque )";
        $result = parent::prepare( $query );
        $result->execute( $post );
        $this->statuscodPDO = $result->errorCode();
        $this->idgravado = parent::lastInsertId();
    }
    
    public function atualizarDados( $tabela, $post, $condicao="" ){

        $drtrateiro = new \Classes\Sources\TrataDados();
        
        $post       = $drtrateiro->definirCharset($post);
        
        $fields     = parent::query( "show fields from `".$tabela."`" );        
        
        $campos     = "";

        foreach( $fields as $v ){
            
            if($v[5]=="auto_increment"){}else{
            
                if( $campos == "" ){

                    $campos = "`".$v[0]."`=:".$v[0];

                }else{

                    $campos .= ",`".$v[0]."`=:".$v[0];
                }
            }
        }
        
        $query="update `".$tabela."` set $campos where ".$condicao;
        $result = parent::prepare( $query );
        $result->execute( $post );
              
    }
    
    public function atualizarDado( $tabela, $field, $valor, $condicao="" ){
        
        $query="update `".$tabela."` set `".$field."`='".$valor."' where ".$condicao;
        $result = parent::prepare( $query );
        $result->execute();
        $this->statuscodPDO = $result->errorCode();
    }
    
    public function deletarDados( $tabela, $condicao ){
        
        $query="delete from `".$tabela."` where ".$condicao;
        $result = parent::prepare( $query );
        $result->execute();
        
    }

}

