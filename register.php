<?php

require_once 'core/init.php';

if( Input::exists() ){
    $validate = new Validate();

    $validation = $validate->check($_POST, array(
        'name'=>array(
            'required'=>true,
            'min'=>2,
            'max'=>50,
        ),
        'username'=>array(
             'required'=>true,
            'min'=>2,
            'max'=>20,
            'unique'=>'user'
        ),
        'password'=>array(
            'required'=>true,
            'min'=>6,
        ),
        're_password'=>array(
            'matches'=>'password'
        )
    ));
    if( $validate->getPass() ){
        if(Token::check(Input::get('token'))){
            echo 'valid token';
            $user =new User();
            $hash = Hash::makePassword(Input::get('password'));
            $userData = array(
                'name'=>Input::get('name'),
                'username'=>Input::get('username'),
                'password'=>$hash,
                'joined'=>Date('Y-m-d H:i:s'),
                'group_id'=>1,
               // 'salt'=>'nolonger needed.'
            );
            try{
                $user->registerUser($userData);
                  Session::flash('success', 'You have been successfully register .');
            header('Location: index.php');
            }catch(Exception $e){
                die($e->getMessage());
            }

          
        }else{
            echo 'invalid token';
        }
       
    }else{
        foreach( $validate->getErrors() as $error ){
            echo $error . '</br>';
        }
    }
}else{
    echo 'Form has not been submited yet';
}



?>
<form action='' method='post'>

    <div class="fields">
        <label for="username" > User Name </label>
        <input name='username' id='username' value="<?php echo escape(Input::get('username')); ?>" autocomolete="false" />
    </div>
        <div class="fields">
        <label for="name" >Name </label>
        <input name='name' id='name' value="<?php echo escape(Input::get('name')); ?>" autocomolete="false" />
    </div>
    <div class="fields">
        <label for="password" > Password </label>
        <input type='password' name='password' id='password' value="" autocomolete="false" />
    </div>
    <div class="fields">
        <label for="re_password" > Enter your password again </label>
        <input type='password' name='re_password' id='re_password' value="" autocomolete="false" />
    </div>
    <input type='submit' value='Register'/>
    <input type="hidden" name="token" value="<?php echo Token::generate(); ?>" />
</form>