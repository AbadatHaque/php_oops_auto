<?php

class User{

    private $_db = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }

    public function registerUser($userData=array()){
        $tableName='user';
        if(!$this->_db->insert($tableName,$userData)){
            throw new Exception('This is a problem to register a user .');
        }
    }
}