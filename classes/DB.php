<?php

class DB{
    private static $_instance = null;
    private $_pdo, $querry, $error=false, $result, $_count =0;

    private function __constructor(){
        try {
          $this->_pdo = new PDO('mysql','','');
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

}