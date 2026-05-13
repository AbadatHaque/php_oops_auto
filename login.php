<?php
if(Input::exists()){

    $validate = new Validate();
    $validation = $validate->check($_POST, array(
        'username'=>array(
            'required'=>true
        ),
        'password'=>array(
            'required'=> true
        )
        ));


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