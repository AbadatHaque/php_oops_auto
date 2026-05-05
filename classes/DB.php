<?php

class DB{
    private static $_instance = null;
    private $_pdo, $_query, $_error=false, $_result, $_count =0;

    private function __construct(){
        try {
        //   $this->_pdo = new PDO('mysql:host='. Config::getValue('mysql/host'),'db_name='. Config::getValue('mysql/db'),Config::getValue('mysql/username'),Config::getValue('mysql/password'));
        $this->_pdo = new PDO(
    'mysql:host=' . Config::getValue('mysql/host') . ';dbname=' . Config::getValue('mysql/db'),
    Config::getValue('mysql/username'),
    Config::getValue('mysql/password')
);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance(){
        if(!isset(self::$_instance)){
            self::$_instance = new DB();
        }
        return self::$_instance;
    }

    public function query($sql,$params=array()){
        $this->_error = false;

        if( $this->_query = $this->_pdo->prepare($sql) ){
            if(count($params)){
                $x=1;
                foreach($params as $param){
                    $this->_query->bindValue($x,$param);
                    $x++;
                }
            }
            if( $this->_query->execute() ) {
                echo 'Successfully execute query';
            }
        }
    }

}