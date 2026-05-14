<?php
require_once 'core/init.php';
if(Input::exists()){
    // echo 'true exists';
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username'=>array(
            'required'=>true
        ),
        'password'=>array(
            'required'=> true
        )
        ));

       if($validate->getPass()){
        $user = new User();
        $username = Input::get('username');
        $password = Input::get('password');
        //  print_r($user);
        if($user->login($username, $password)){
            Redirect::to('index.php');
           echo 'authenticate';
        }else{
            echo "Credentials do not match";
        }
       }else{
         foreach( $validate->getErrors() as $error){
            echo $error . '</br>';
         }
       }

}

?>

<form action='' method='post'>
<div class="field">
<label for='username'>Username</label>
<input id='username' type='text'name='username' value=''autocomplete='off'/>
</div>
<div class="field">
<label for='password'>Password</label>
<input id='password' type='text'name='password' value=''autocomplete='off'/>
</div>
<input type='submit' value='Login'/>
<input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />

</div>


</form>