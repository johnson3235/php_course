<?php

$title = "Register";
include_once "layouts/header.php";
include_once "app/middleware/guest.php";
include_once "layouts/nav.php";
include_once "layouts/bread-crumb.php";

use app\mail\Mail;
use app\database\models\User;
use app\requests\RegisterRequest;



define('Expiration_Duration',360);

if($_POST){
    $errors=[];
    //start validation
   $data = new RegisterRequest;
   $data->setEmail($_POST['email']);
   $errors['email']=$data->emailValidaiton();
   $data->setPassword($_POST['password']);
   $data->setPassword_confirmation($_POST['password_confirmation']);
   $errors['password']=$data->passwordValidation();
   $data->setPhone($_POST['phone']);
   $errors['phone']=$data->phoneValidation();
   $data->setgender($_POST['gender']);
   $errors['gender']=$data->genderValidation();
   //end validation

   // Start generate code then insert in database

   if(empty($errors['email']) && empty($errors['password']) && empty($errors['phone']) && empty($errors['gender'])){
   $code=rand(10000,99999);
   $expireddate=date('Y-m-d H:i:s',strtotime('+360 seconds'));
   $userDetails=new User;
   $userDetails->setFirst_name($_POST['first_name']);
   $userDetails->setLast_name($_POST['last_name']);
   $userDetails->setEmail($_POST['email']);
   $userDetails->setPhone($_POST['phone']);
   $userDetails->setPassword(bcrypt($_POST['password']));
   $userDetails->setGender($_POST['gender']);
   $userDetails->setCode($code);
   $userDetails->setStatus(0);
   $userDetails->setExpired_at($expireddate);
   $result=$userDetails->insertUserRegister();
   if($result)
   {
       // send email with code Start
   $subject='Ecomerce Verification Code';
   $body="<h2>Verify Your Email Address</h2> <p style='fontsize:20px; fontweight:bold;'>Your Verfication Code : <span class='color:green; padding:3px;'>$code</span></p>";
  $send_mail=new Mail($_POST['email'],$subject,$body);
  if($emailResult = $send_mail->verficationCode()){
    $_SESSION['email'] = $_POST['email'];
    header('location:check-code.php');die;
}}
}
}
?>
<div class="login-register-area ptb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                <div class="login-register-wrapper">
                    <div class="login-register-tab-list nav">
                        <a class="active" data-toggle="tab" href="#lg2">
                            <h4> register </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg2" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <form method="post">
                                        <div class="mb-4">
                                            <input type="text" name="first_name" placeholder="First Name"
                                                style="margin-bottom:0px;"
                                                value="<?php set('first_name')?>">
                                            <?php
                                            if($_POST){
                                            if(empty($_POST['first_name']))
                                            {
                                                echo "<div class='alert alert-danger '> Firstname Is Required </div> ";
                                            }
                                        }
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                            <input type="text" name="last_name" placeholder="Last Name"
                                                style="margin-bottom:0px;"
                                                value="<?php set('last_name')?>">
                                            <?php
                                            if($_POST){
                                            if(empty($_POST['last_name']))
                                            {
                                                echo "<div class='alert alert-danger '> Firstname Is Required </div> ";
                                            }}
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                            <input name="email" placeholder="Email" type="email"
                                                style="margin-bottom:0px;"
                                                value="<?php if(empty($errors['email'])){ set('email');}?>">
                                            <?php
                                            if($_POST){
                                             if(!empty($errors['email']))
                                             foreach($errors['email'] as $error){
                                             {
                                                 echo '<div class="alert alert-danger"> '.$error.'</div>';
                                             }
                                         }}
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                            <input name="phone" placeholder="Phone" type="number"
                                                style="margin-bottom:0px;"
                                                value="<?php if(empty($errors['phone'])){ set('phone');}?>">
                                            <?php
                                           if(!empty($errors['phone']))
                                           foreach($errors['phone'] as $error){
                                           {
                                               echo '<div class="alert alert-danger"> '.$error.'</div>';
                                           }
                                       }
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" name="password" placeholder="Password"
                                                style="margin-bottom:0px;" value="<?php if(empty($errors['password'])){set('password'); }?>">
                                            <?php
                                            if(!empty($errors['password']))
                                            foreach($errors['password'] as $key=>$error){
                                            {
                                                if($key != 'confirmation-required')
                                                {
                                                echo '<div class="alert alert-danger"> '.$error.'</div>';
                                                }
                                            }
                                        }
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                            <input type="password" name="password_confirmation"
                                                placeholder="Password Confirmation" style="margin-bottom:0px;" value="<?php if(empty($errors['password'])){ set('password_confirmation');}?>">
                                            <?php
                                             if(!empty($errors['password'])){
                                             foreach($errors['password'] as $key=>$error){
                                             {
                                                if($key == 'confirmation-required')
                                                {
                                                echo '<div class="alert alert-danger"> '.$error.'</div>';
                                                }
                                             }
                                         }}
                                            ?>
                                        </div>
                                        <div class="mb-4">
                                        <select name="gender" class="form-control " id="">
                                            <option value="m" <?php if($_POST){if($_POST['gender'] == 'm'){echo 'selected';}} ?>>Male</option>
                                            <option value="f" <?php if($_POST){if($_POST['gender'] == 'f'){echo 'selected';}} ?>>Female</option>
                                        </select>
                                        <?php
                                             if(!empty($errors['gender'])){
                                             foreach($errors['gender'] as $error){
                                             {
                                              
                                                echo '<div class="alert alert-danger"> '.$error.'</div>';
                                                
                                             }
                                         }}
                                            ?>
                                        </div>
                                        <div class="button-box mt-5">
                                            <button type="submit"><span>Register</span></button>
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