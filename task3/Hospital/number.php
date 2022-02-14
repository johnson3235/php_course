<?php
$title="number";
include "layout/header.php";

if($_POST)
{
    $errors = [];
    $number=$_POST['number'];
    $_SESSION['number']=$number;
  if(empty($_POST['number'])){
    $errors['number-required'] =  "<div class='alert alert-danger'> Number Is Required </div>";
  }

}

?>
   <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center" style="color: #11aad3; font-weight:bold;">
                Hospital
                </h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 text-center p-auto">
                <img class="img w-75" src="img/home.png" alt=" Home">
            </div>
            <div class="col-lg-6 col-md-12 mt-5">
                <form method="post">
                    <div class="column form-group">
                        <div class="row col-12 mt-3 ">
                            <div class="col-8 mt-2 offset-2">
                            <div class="input-group mt-5">
                            <div class="input-group-text" style="background-color: #212529;
    color: #11aad3; font-weight:bold;">Phone Number</div>
                                <input type="number" name="number" id="number" class="form-control" min=0
                                    placeholder="Please Enter Phone Number" aria-describedby="helpId"
                                    value="<?php if(!empty($number)){echo $number;}?>">
                            </div>
                            <?php if($_POST){if(empty($number)) {
                                      echo $errors['number-required'];
                                    }
                                    else
                                    {
                                        header("location:review.php");}}
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row col-6 offset-3 ">
                        <button class="btn col-12 mt-3 p-3 align-center  rounded"
                            style="color: #11aad3; font-weight:bold; background-color:#212529; ">
                            Calculate
                        </button>
                    </div>
        
                </form>
            </div>
        </div>
    </div>









<?php include "layout/footer.php"; ?>
 
      
   