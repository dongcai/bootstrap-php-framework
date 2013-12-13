<?php
// show negative messages
if ($this->get('login')->errors) {
    foreach ($this->get('login')->errors as $error) {
        echo '<div class="alert alert-danger">' . $error . '</div>';
    }
}

// show positive messages
if ($this->get('login')->messages) {
    foreach ($this->get('login')->messages as $message) {
        echo '<div class="alert alert-success">' . $message . '</div>';
    }
}
?>
<!-- errors & messages --->

<div class="container">
    <div class="rows">
        <div class="col-md-5 col-md-offset-3 panel">
            <!-- login form box -->
            <form class="form-signin" method="post" action="<?php echo SITE_BASE_URL . "/login"; ?>" name="loginform">
                <h2 class="form-signin-heading">Please sign in</h2>
                <div class="form-group">
                <input name="user_name" type="text" class="form-control" placeholder="Username" 
                       required="required" autofocus="">
                </div>
                <div class="form-group">
                <input name="user_password" type="password" class="form-control" placeholder="Password" required="">
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Sign in</button>

            </form>

        </div>
    </div>
</div>