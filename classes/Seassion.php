<?php

class Session{

  public  static function put($name,$value){
        return $_SESSION[$name] = $value;
    }

    public static function get($name){
        return $_SERVER[$name];
    }

    public static function delete($name){
        if(isset($_SESSION[$name])){
            unset($_SESSION[$name]);
        }
    }
}