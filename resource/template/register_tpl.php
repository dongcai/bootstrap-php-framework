<!-- errors & messages --->
<?php

// show negative messages
if ($this->get('registration')->errors) {
    foreach ($this->get('registration')->errors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';   
    }
}

// show positive messages
if ($this->get('registration')->messages) {
    foreach ($this->get('registration')->messages as $message) {
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
}

?>
<!-- errors & messages --->

<div class="container">
    <div class="rows">
        <div class="col-md-5 col-md-offset-3 panel">
            <!-- login form box -->
            <form class="form-signin" method="post" action="<?php echo SITE_BASE_URL . "/register"; ?>" name="registerform">
                <h2 class="form-signin-heading">Register</h2>
                <div class="form-group">
                <input id="login_input_username" class="form-control" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required />
                <p class="help-block">Username (only letters and numbers, 2 to 64 characters)</p>
                </div>
                
                <div class="form-group">
                <input id="login_input_password_new" class="form-control" type="password" name="user_password_new" pattern=".{6,}" required autocomplete="off" />  
                <p class="help-block">Password (min. 6 characters)</p>
                
                </div>
                
                <div class="form-group">
                <input id="login_input_password_repeat" class="form-control" type="password" name="user_password_repeat" pattern=".{6,}" required autocomplete="off" />     
                <p class="help-block">Repeat Password</p>
                
                </div>
                
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="register">Register</button>

            </form>

        </div>
    </div>
</div>

