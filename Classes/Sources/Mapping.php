<?php

/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/

namespace Classes\Sources;
use Classes\DB\MyPDO;

class Mapping extends MyPDO{
    
    private $folder_dao;
    private $folder_vos;
    
    public function getFolderDao(){
        
        return $this->folder_dao;
    }
    public function setFolderDao($folder_dao){
        
        $this->folder_dao = $folder_dao;
    }
    public function getFolderVos(){
        
        return $this->folder_vos;
    }
    public function setFolderVos($folder_vos){
        
        $this->folder_vos = $folder_vos;
    }    

    public function mappEntity(){
        
        $pathvo  = getcwd() . DIRECTORY_SEPARATOR . $this->getFolderVos();
        $pathdao = getcwd() . DIRECTORY_SEPARATOR . $this->getFolderDao();

        if( count( $this->findTableName() ) > 0 ){
            
            foreach ( $this->findTableName()[2] as $i => $v ){
                
                $contentvos = $this->writeClassVo( $v, $this->findFieldName( $this->findTableName()[1][$i] ) );
                $contentdao = $this->writeClassDao( $v, $this->findTableName()[1][$i], $this->findFieldName( $this->findTableName()[1][$i] ) );
                
                if( !is_dir( $pathvo ) ){ mkdir( $pathvo, 0777, true ); }
                
                $path_full_vo = $pathvo . DIRECTORY_SEPARATOR . $v . ".php";
                
                if( !file_exists( $path_full_vo ) ){
                    
                    $handle = fopen( $path_full_vo, "w") or die("Não foi possível abrir o arquivo!");
                    fwrite( $handle, $contentvos );
                    fclose( $handle );
                    chmod( $path_full_vo, 0777 );
                }
                
                if( !is_dir( $pathdao ) ){ mkdir( $pathdao, 0777, true ); }
                
                $path_full_dao = $pathdao . DIRECTORY_SEPARATOR . $v . "DAO.php";
                
                if( !file_exists( $path_full_dao ) ){
                    
                    $handle = fopen( $path_full_dao, "w") or die("Não foi possível abrir o arquivo!");
                    fwrite( $handle, $contentdao );
                    fclose( $handle );
                    chmod( $path_full_dao, 0777 );
                }
            }
        }
    }
    
    private function findTableName(){
        
        $sql_table = "show tables";
        $result    = parent::query( $sql_table );
        
        $rows = "";

        if( $result ){

            while( $row = $result->fetch( 3 ) ){
                
                $rows[1][] = $row[0];
                $rows[2][] = $this->findEvent( $row[0] );
            }
        }
        
        return $rows;
    }
    
    public function findFieldName( $tabela ){
        
       $result = parent::query( "show fields from `".$tabela."`" );
       $rows   = "";
       
       if( $result ){
            
           while( $row = $result->fetch( 3 ) ){
                
              $rows[] = $row;
           }
       }
       return $rows;
    }   
    
    private function findEvent( $name_table ) {

        $needle1 = '_';
        $needle2 = '-';
        $pos1 = strripos( $name_table, $needle1 );
        $pos2 = strripos( $name_table, $needle2 );

        if ( $pos1 ) {

            $array_string = explode( $needle1, $name_table );
            
            return $this->writeName( $array_string );
            
        } else if ( $pos2 ) {

            $array_string = explode( $needle2, $name_table );
            
            return $this->writeName( $array_string );
            
        } else {
            
            return ucfirst( $name_table );
        }
        
        return false;
    }
    
    private function writeName( $array ) {

        if ( count( $array ) > 0 ) {

            $name = "";

            foreach ($array as $i => $v) {

                $name .= ucfirst( $v );
            }

            return $name;
        }
        
        return false;
    }
    
    private function writeClassVo( $nameclass, Array $fields ){
        
        if( count( $fields ) > 0 ){
        
            $content  = "<?php\n\n";
            $content .= "/************************************************\n";
            $content .= "*        Ferramentas DevPHP Bruno Alves        *\n";
            $content .= "************************************************/\n\n";
            $content .= "namespace " . $this->getFolderVos() . ";\n\n";
            $content .= "class " . $nameclass . "{\n\n";
            
            foreach ( $fields as $i => $v ){
                
                $content .= "\tprivate $" . $v[0] . ";\n";
            }
            
            $content .= "\n";
                    
            foreach ( $fields as $i => $v ){
                
                $content .= "\tpublic function set" . ucfirst( $v[0] ) . "($" . $v[0] ."){\n\n";
                $content .= "\t\t\$this->" . $v[0] . "=$" . $v[0] . ";\n";
                $content .= "\t}\n";
                
                $content .= "\tpublic function get" . ucfirst( $v[0] ) . "(){\n\n";
                $content .= "\t\treturn \$this->" . $v[0] . ";\n";
                $content .= "\t}\n";                
            }
            
            $content .= "\n";
            $content .= "}";
            
            return $content;
        }
        return "";
    }
    
    private function writeClassDao( $nameclass, $nametable, Array $fields ){
        
        if( count( $fields ) > 0 ){

            $content  = "<?php\n\n";
            $content .= "/************************************************\n";
            $content .= "*        Ferramentas DevPHP Bruno Alves        *\n";
            $content .= "************************************************/\n\n";
            $content .= "namespace " . $this->getFolderDao() . ";\n\n";
            $content .= "use Classes\DB\MyPDO;\n";
            $content .= "use " . $this->getFolderVos() . "\\" . $nameclass . ";\n\n";
            $content .= "class " . $nameclass . "DAO extends MyPDO{\n\n";          
            $content .= "\tpublic function insert( " . $nameclass . " \$" . $nameclass . " ){\n\n";
            $content .= "\t\tparent::beginTransaction();\n";

            $campos = "";
            $marque = "";
            $blind  = "";
            
            foreach ( $fields as $i => $v ){
                
                if ( $v[5] == "auto_increment" ) {} else {

                    if ( $campos == "" && $marque == "" ){

                            $campos = "`" . $v[0] . "`";
                            $marque = ":" . $v[0];
                    } else {

                            $campos .= ",`" . $v[0] . "`";
                            $marque .= ",:" . $v[0];
                    }
                    
                    $blind .= "\t\t\t\$sttm->bindValue(':".$v[0]."', \$".$nameclass."->get".  ucfirst( $v[0] )."());\n";
                }
            }
            
            $query  = "insert into `".$nametable."` ( ".$campos." ) value ( ".$marque." )";
            
            $content .= "\t\ttry {\n\n";
            $content .= "\t\t\t\$sttm = parent::prepare( '" . $query . "' );\n";
            $content .= $blind;
            $content .= "\t\t\t\$sttm->execute();\n";
            $content .= "\t\t\tparent::commit();\n\n";
            $content .= "\t\t} catch(Exception \$e) {\n\n";
            $content .= "\t\t\tparent::rollBack();\n";
            $content .= "\t\t}\n";
            $content .= "\t}\n";
            $content .= "}";
            
            return $content;
        }
        return "";
    }    
}