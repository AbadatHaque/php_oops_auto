<?php
class Token{

    static function generate(){
       return Session::put(Config::getValue('session/token_name', md5(uniqid())));
    }
}