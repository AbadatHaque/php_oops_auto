<?php
require_once "core/init.php";

echo Config::getValue('mysql/host');

 $user = DB::getInstance()->get('user',array('username','=','sk009'));

 if(!$user->count()){
    echo 'not found data';
 
 }else{
    
     echo 'Founded data';
     foreach($user->getResult() as $u){
        echo '<br/>', $u->name, '<br/>';
     }
        print_r( $user->getResult());
 }