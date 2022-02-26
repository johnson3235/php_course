<?php
use app\database\models\User;
use app\mail\Mail;
use app\requests\RegisterRequest;

$title = "Verification Code";
include_once "layouts/header.php";

include_once "app/middleware/guest.php";

function checkIfNotExpired()
{
    global $expiration_code;
    if (date('Y-m-d H:i:s') <= $expiration_code) {
        return true;
    } else {
        return false;
    }
}

$userObject = new User;
$userObject->setEmail($_SESSION['email']);


if (isset($_POST['resend-code'])) {
    $errors = [];
    $code = rand(10000, 99999);
    $expirationDate = date('Y-m-d H:i:s', strtotime('+360 seconds'));
    $userObject->setCode($code);
    $userObject->setexpired_at($expirationDate);
    $result = $userObject->updateCode();
    if ($result) {
        $subject='Ecomerce Verification Code';
        $body="<h2>Verify Your Email Address</h2>
         <p style='fontsize:20px; fontweight:bold;'>Your Verfication Code : <span class='color:green; padding:3px;'>$code</span></p>";
        $send_mail = new Mail($_SESSION['email'], $subject, $body);
        $emailResult = $send_mail->verficationCode();
        if ($emailResult) {
            $success['resend-scuccess'] = "We have sent you an email address please Check Your Mailbox";
        }
    } else {
        $errors['code']['error'] = 'Try Again Later';
    }
}
$expiration_code = $userObject->getUserByEmail($_SESSION['email'])->fetch_object()->code_expired_at;

if (isset($_POST['check_code'])) {

    //validation
    $errors2=[];
    $check_validation = new RegisterRequest;
    $check_validation->setCode($_POST['code']);
    $errors['code']=$check_validation->codeValidation();
  
    //validation
    if (empty($errors['code'])) {
        $userObject->setCode($_POST['code']);
        $userObjectResult = $userObject->checkByCode();
        if ($userObjectResult->num_rows == 1) {
            if (checkIfNotExpired()) {
                $user = ($userObjectResult->fetch_object());
                $userObject->setEmail_verified_at(date('Y-m-d H:i:s'));
                $userObject->setStatus('1');
                $updateResult = $userObject->changeUserStatus();
                if ($updateResult) {
                    header('Refresh:2;Url=login.php');
                } else {
                    $errors['code']['error'] = 'Something Went Wrong';
                }
            } else {
                $errors['code']['Expired'] = 'Expired Code';
            }
        } else {
            $errors['code']['wrong'] = 'Wrong Code';
        }
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
                            <h4> <?= $title ?> </h4>
                        </a>
                    </div>
                    <div class="tab-content">
                        <div id="lg1" class="tab-pane active">
                            <div class="login-form-container">
                                <div class="login-register-form">
                                    <?php
                                    if (isset($success['resend-scuccess'])) {
                                        echo "<div class='alert alert-success text-center' >{$success['resend-scuccess']} </div>";
                                    }
                                    if (isset($updateResult) && $updateResult) {
                                        echo "<div class='alert alert-success text-center' > Verfication ! </div>";
                                    }
                                    ?>
                                    <form method="post">
                                        <input type="number" name="code" placeholder="Code">
                                        <?php
                                        if (isset($errors['code'])) {
                                            foreach ($errors['code'] as  $error) {
                                                echo "<p class='text-danger' > {$error} </p>";
                                            }
                                        }
                                        ?>
                                        <div class="button-box">
                                            <button type="submit" name="check_code"><span><?= $title ?></span></button>
                                            <button type="submit" class="btn btn-danger text-light" name="resend-code" id="demo" disabled><span></span></button>
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
<script>

    var countDownDate = new Date("<?= $expiration_code ?>").getTime();
    console.log(countDownDate);

    var x = setInterval(function() {

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        // var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        // var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // Display the result in the element with id="demo"
        document.getElementById("demo").innerHTML =  minutes + ":" + seconds;

        // If the count down is finished, write some text
        if (distance < 0) {
            clearInterval(x);
            var button = document.getElementById("demo");
            button.innerHTML = "Resend Code";
            button.removeAttribute("disabled");
            button.removeAttribute("class");
        }
    }, 1000);
</script>
<?php

include_once "layouts/footer-scripts.php";
?>
