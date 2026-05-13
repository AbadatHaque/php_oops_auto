<?php
require_once "core/init.php";

// echo Config::getValue('mysql/host');

//  $user = DB::getInstance()->get('user',array('username','=','sk009'));

//  $user = DB::getInstance()->insert('user',array('name'=> 'saddam', 'username'=>'haque09',
// 'password'=>'password', 'salt'=>'salt'));

//$updateUser = DB::getInstance()->update('user',1, array('name'=>'vijoy', 'username'=>'CM'));

if(Session::exists('success')){
    echo Session::flash('success');
}
