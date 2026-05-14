<?php

class User{

    private $_db = null;
    private $_data = null;
    private $_isLogin = false;
    private $_session_name = '';

    public function __construct($user = null){
       $this->_session_name = Config::getValue('session/session_name');
        $this->_db = DB::getInstance();
        if(!$user){
            if(Session::exists($this->_session_name)){
                $user = Session::get($this->_session_name);
                if($this->find($user)){
                    $this->_isLogin = true;
                }else{
                    // Redirect::to('login.php');
                }
            }else{
                // Redirect::to('login.php');
            }
        }else{
            $this->find($user);
        }
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
      if($data){
        if(is_numeric($data)){
            $field = 'id';
        }
       $users =  $this->_db->get($tableName,array($field,'=', $data));
       if($users->count()){
        $this->_data = $users->first();
        return true;
       }
      }
       
        return false;
    }

    public function login($username='',$password=''){
        if($this->find($username)){
            if($this->_data){   
                $isAuthenticate = Hash::check($password, $this->_data->password);
                if($isAuthenticate){
                    $this->_isLogin = true;
                    Session::put($this->_session_name, $this->_data->id);
                    return true;
                }
             }
        }
        return false;
    }

    public function data(){
        return $this->_data;
    }

    public function loginStatus(){
        return $this->_isLogin;
    }
    public function logout(){
        Session::delete($this->_session_name);
        $this->_isLogin = false;
    }
}