<?php
class Config{
    public static function getValue($path){
        if($path){
            $pathArr = explode('/',$path);
            $config = $GLOBALS['config'];

            foreach($pathArr as $bit){
                if( isset($config[$bit]) ){
                     $config = $config[$bit];
                }else{
                    return 'wrong path';
                }

            }

            return $config;
        }else{
            return 'worng path';
        }
    }
}