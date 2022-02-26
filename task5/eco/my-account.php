<?php

use app\database\models\User;
use app\mail\Mail;
use app\requests\LoginRequest;
use app\requests\RegisterRequest;
$title = "My Account";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "app/middleware/auth.php";
define('MAX_UPLOAD_SIZE', 1024 ** 2); // 1 mega
define("ALLOWED_EXTENSIONS", ['png', 'jpg', 'jpeg']);
define('NOT_VERIFIED', 0);
$errors = [];
$success = [];

if (isset($_POST['update'])) {
    // print_r($_FILES);die;
    // validaiton

    if (empty($_POST['first']) || empty($_POST['last']) || empty($_POST['gender']) || empty($_POST['phone'])) {
        $errors['update']['all-feilds'] = "All Feilds Are Required";
    }

    if (empty($errors)) {
        $userObject = new User;
        $userObject->setFirst_name($_POST['first']);
        $userObject->setLast_name($_POST['last']);
        $userObject->setGender($_POST['gender']);
        $userObject->setPhone($_POST['phone']);
        $userObject->setEmail($_SESSION['user']->email);
        if ($_FILES['image']['error'] == 0) {
            if ($_FILES['image']['size'] > MAX_UPLOAD_SIZE) {
                $errors['update']['image']['size'] = "Max Image Size " . MAX_UPLOAD_SIZE / (1024 ** 2) . " Mega Byte";
            }

            $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
            if (!in_array($extension, ALLOWED_EXTENSIONS)) {
                $errors['update']['image']['extension'] = "Allowed Extensiosn Are : " . implode(', ', ALLOWED_EXTENSIONS);
            }
            if (empty($errors['update']['image'])) {
                $photoName = uniqid() . '.' . $extension; 
                $photoPath = 'assets/img/users/';
                move_uploaded_file($_FILES['image']['tmp_name'], $photoPath . $photoName);
                $_SESSION['user']->image = $photoName; 
                $userObject->setImage($photoName);
            }
        }

        if (empty($errors['update']['image'])) {
            $result = $userObject->update();
            if ($result) {

                $_SESSION['user']->first_name = $_POST['first'];
                $_SESSION['user']->last_name = $_POST['last'];
                $_SESSION['user']->gender = $_POST['gender'];
                $_SESSION['user']->phone = $_POST['phone'];
                // success
                $success['update']['success'] = "Updated Data Successfully";
            } else {
                $errors['update']['isExist'] = "Phone Already Exists";
            }
        }
    }
}



if(isset($_POST['update-pass']))
{
   $errors = [];
   $success=[];
   $log_validation =new RegisterRequest;
   $log_validation->setPassword($_POST['new-pass']);
   $log_validation->setPassword_confirmation($_POST['new-pass-confirm']);
   $errors['password']=$log_validation->passwordValidation();
   if(empty($errors['password']))
   {
       $userObject=new user;
       $userObject->setEmail($_SESSION['user']->email);
       $result=$userObject->getUserByEmail();
       if($result->num_rows==1)
       {
           $userResult=$result->fetch_object();
           if(password_verify($_POST['old'],$userResult->password))
           {
             $userObject->setPassword(bcrypt($_POST['new-pass']));
             $resultUpdate=$userObject->updatePass();
             if($resultUpdate)
             {
                $success['password']="<div class='alert alert-success text-center'>Update Password Successfully</div>";
             }
             else
             {
                 $errors['password']['something']='Try Again Later!!';
             }
           }
           else{
           $errors['password']['wrong']='Your Old Password Is Wrong';
           }
       }
   }
}

?>
        <!-- my account start -->
        <div class="checkout-area pb-80 pt-100">
            <div class="container">
                <div class="row">
                    <div class="ml-auto mr-auto col-lg-9">
                        <div class="checkout-wrapper">
                            <div id="faq" class="panel-group">
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>1</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h5>
                                    </div>
                                    <div id="my-account-1" class="panel-collapse collapse <?php if(isset($_POST['update'])){echo 'show';}?>">
                                        <div class="panel-body">
                                            <div class="billing-information-wrapper">
                                            <form action="" method="post" enctype="multipart/form-data">
                                                <div class="account-info-wrapper">
                                                    <h4>My Account Information</h4>
                                                    <h5>Your Personal Details</h5>
                                                </div>
                                                <div class="row">
                                                <?php
                                                    if (!empty($errors['update'])) {
                                                        foreach ($errors['update'] as  $error) {
                                                            if (is_string($error)) {
                                                                echo "<p class='text-center alert alert-danger'> {$error} </p>";
                                                            } else {
                                                                foreach ($error as $e) {
                                                                    echo "<p class='text-center alert alert-danger'> {$e} </p>";
                                                                }
                                                            }
                                                        }
                                                    }
                                                    if (!empty($success['update'])) {
                                                        foreach ($success['update'] as  $success) {
                                                            echo "<div class='col-12 alert alert-success text-center'> {$success} </div>";
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                                <div class="col-12 my-5">
                                                    <div class="row mb-5">
                                                        <div class="col-4 offset-4">
                                                            <label for="image" style="cursor: pointer;">
                                                                <img src="assets/img/users/<?= $_SESSION['user']->image ?>" alt="<?= $_SESSION['user']->first_name ?>" class="w-100 rounded-circle">
                                                            </label>
                                                            <input type="file" name="image" id="image" class="d-none">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>First Name</label>
                                                            <input type="text" name="first" value="<?php echo $_SESSION['user']->first_name; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Last Name</label>
                                                            <input type="text" name="last"  value="<?php echo $_SESSION['user']->last_name; ?>">
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="row">
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Phone</label>
                                                            <input type="text" name="phone" value="<?php echo $_SESSION['user']->phone; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6 col-md-6">
                                                        <div class="billing-info">
                                                            <label>Gender</label>
                                                            <select name="gender" class="form-control " id="">
                                            <option value="m" <?php if($_SESSION['user']->gender == 'm'){echo 'selected';} ?>>Male</option>
                                            <option value="f" <?php if($_SESSION['user']->gender == 'f'){echo 'selected';} ?>>Female</option>
                                        </select>
                                                        </div>
                                                    </div>
                                                    </div>
                                                    <div class="col-6 offset-3 billing-btn">
                                                        <button class="btn btn-outline-success p-4 w-100" type="submit" name="update">Update</button>
                                                    </div>
                                                </div>
                                         
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title"><span>2</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-2">Change your password </a></h5>
                                    </div>
                                    <div id="my-account-2" class="panel-collapse collapse <?php if(isset($_POST['update-pass'])){echo 'show';}?>">
                                        <div class="panel-body">
                                        <form action="" method="post">
                                            <div class="billing-information-wrapper">
                                                <div class="account-info-wrapper">
                                                    <h4>Change Password</h4>
                                                </div>
                                                <div class="row">
                                                <div class="col-lg-12 col-md-12">
                                                    <?php if(isset($_POST['update-pass'])){if(!empty($errors['password'])){
                                                       foreach($errors['password'] as $error)
                                                       {
                                                       echo "<div class='alert alert-danger text-center'>".$error."</div>";
                                                       }
                                                    }
                                                    else
                                                    {
                                                        echo $success['password'];
                                                    } }?>
                                                        <div class="billing-info">
                                                            <label>Old Password</label>
                                                            <input type="password" name="old">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>New Password</label>
                                                            <input type="password" name="new-pass">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 col-md-12">
                                                        <div class="billing-info">
                                                            <label>New Password Confirm</label>
                                                            <input type="password" name="new-pass-confirm">
                                                        </div>
                                                    </div>
                                                    
                                                </div>

                                                    <div class="billing-btn col-6 offset-4 ">
                                                        <button type="submit" name="update-pass">Change Password</button>
                                                </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h5 class="panel-title" ><span>3</span> <a data-toggle="collapse" data-parent="#faq" href="#my-account-3">Change Email Address -> Disabled </a></h5>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- my account end -->
        <!-- Footer style Start -->
            <?php
include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";

?>
