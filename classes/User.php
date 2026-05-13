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

    public function find($data){
        $tableName = 'user';
        $field = 'username';
        if(is_numeric($data)){
            $field = 'id';
        }
        
       
        return false;
    }

    public function login($username='',$password=''){
        $user = $this-_db->get('user', array('username', '=', $username));
        if($user->count()){
            $userData = $user->first();
          $isAuthenticate = Hash::check($password, $userData->password);
            if(isAuthenticate){

            }else{
                echo "Credentials do not match";
            }
        }
    }
}