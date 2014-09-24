<?php

/************************************************
 *        Ferramentas DevPHP Bruno Alves        *
 ************************************************/
namespace Classes\DB;
use PDO;

class MyPDO extends PDO{
    
    protected $segmt;
    private static $driver;
    private static $host;
    private static $port;
    private static $user;
    private static $pass;    
    private static $schema;     

    public function __construct( $file ){
        
        if ( !$settings = parse_ini_file( $file, TRUE ) ) {
            
            throw new exception('Impossivel abrir o arquivo ' . $file . '. Tente novamente mais tarde.');
        }

        self::$driver = $settings['database']['driver'];
        self::$host   = $settings['database']['host'];
        self::$port   = ((!empty($settings['database']['port'])) ? (';port=' . $settings['database']['port']) : '');
        self::$user   = $settings['database']['username'];
        self::$pass   = $settings['database']['password'];
        self::$schema = $settings['database']['schema'];
       
        $this->segmt  = parent::__construct( self::$driver.':host='.  self::$host.';port='.  self::$port.';dbname='.  self::$schema , self::$user, self::$pass );
        return $this->segmt;
    }

    public function __destruct(){
        
        $this->segmt = NULL;
    }
}
