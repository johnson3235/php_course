<?php

use app\requests\LoginRequest;
use app\database\models\User;
$title = "Login";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";
include_once "layouts/nav.php";
include_once "layouts/bread-crumb.php";


if($_POST)
{
    $errors = [];
    $login=new LoginRequest;
    $login->setEmail($_POST['email']);
    $errors['email'] = $login->emailValidaiton();
    $login->setPassword($_POST['password']);
    $errors['password'] = $login->passwordValidaiton();
    
    if(empty($errors['email']) && empty($errors['password'])){
        $userObject = new User;
        $userObject->setEmail($_POST['email']);
        $result = $userObject->getUserByEmail();
        if($result->num_rows == 1){
            $user = $result->fetch_object();
            if(password_verify($_POST['password'],$user->password)){
                // correct email , correct password 
                switch($user->status){
                    case 0: // =>Not Verified
                        $_SESSION['email'] = $_POST['email'];
                        header('location:check-code.php');die;
                    case 2: // Blocked Email
                        $errors['email']['blocked'] = "Currently This Email Is Blocked";
                    default:
                    $_SESSION['user'] = $user;
                    header('location:index.php');die;
            }
        }else{
            $errors['password']['wrong-password'] = "Credentials dosen't match our records";
        }
    }
    // check password 
}


}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg1">
                            <h4> login </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form  method="post">
                                        <div class="mb-3">
                                        <input type="text" name="email" placeholder="Username" style="margin-bottom: 0px;" value="<?php echo set('email'); ?>">
                                        <?php
                                        if(!empty($errors['email']))
                                        {
                                            foreach($errors['email'] as $error)
                                            echo "<div class='alert alert-danger text-center'>".$error." </div>";
                                        }

                                        ?>
                                        </div>
                                        <div class="mb-3">
                                        <input type="password" name="password" placeholder="Password" style="margin-bottom: 0px;" value="<?php echo set('password'); ?>">
                                        <?php
                                        if(!empty($errors['password']))
                                        {
                                            foreach($errors['password'] as $error)
                                            echo "<div class='alert alert-danger text-center'>".$error." </div>";
                                        }

                                        ?>
                                        </div>
                                        <div class="button-box">
                                            <div class="login-toggle-btn">
                                                <input type="checkbox">
                                                <label>Remember me</label>
                                                <a href="#">Forgot Password?</a>
                                            </div>
                                            <button type="submit"><span>Login</span></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";
?>