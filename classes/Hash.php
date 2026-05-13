<?php

class Hash{

    static function makePassword($password){
        return password_hash($password,PASSWORD_DEFAULT);
    }

    static function check($store_password, $checkabel_password){
        return password_verify($store_password, $checkabel_password);
    }
}