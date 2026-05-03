<?php

class DB{
    private static $_instance = null;
    private $_pdo, $querry, $error=false, $result, $_count =0;

    private function __constructor(){
        try {
          $this->_pdo = new PDO('mysql:host='. Config::getValue('mysql/host'),'db_name='. Config::getValue('mysql/db'),Config::getValue('mysql/username'),Config::getValue('mysql/password'));
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

}