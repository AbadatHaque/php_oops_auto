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
//session/session_name
if(Session::exists(Config::getValue('session/session_name'))){
    echo Session::get(Config::getValue('session/session_name'));
}

$user = new User();
//echo $user->data()->name;
if($user->loginStatus()){
?>

        <h1>
        Welcome  <?php echo escape($user->data()->name) ?>
        </h1>
        <p>
        usernam: <?php echo escape($user->data()->username) ?>
        </p>
        <a href='logout.php'> logout </a>
   <?php
}else{
    echo '<p> You need to <a href="login.php"> login</a> of <a href="register.php"> Register</a> </p>';

}



