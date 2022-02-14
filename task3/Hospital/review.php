<?php
$title="review";
include "layout/header.php";
if($_POST)
{
    $errors = [];

    function get_check($key,$value){
      
            if((int)$value==(int)$key)
            {
               echo "checked" ;
            }
    }
  
  if(empty($_POST['ques0'])){
    $errors['ques0-required'] =  "<div class='alert alert-danger'> Number1 Is Required </div>";
  }
  if(empty($_POST['ques1'])){
    $errors['ques1-required'] =  "<div class='alert alert-danger'> Number2 Is Required </div>";
  }
  if(empty($_POST['ques2'])){
    $errors['ques2-required'] =  "<div class='alert alert-danger'> Number3 Is Required </div>";
  }
  if(empty($_POST['ques3'])){
    $errors['ques3-required'] =  "<div class='alert alert-danger'> Number4 Is Required </div>";
  }
  if(empty($_POST['ques4'])){
    $errors['ques4-required'] =  "<div class='alert alert-danger'> Number5 Is Required </div>";
  }


  if(!empty($errors))
  {
    $ans1=$_POST['ques0'];
    $ans2=$_POST['ques1'];
    $ans3=$_POST['ques2'];
    $ans4=$_POST['ques3'];
    $ans5=$_POST['ques4'];

    $_SESSION['ques0']=$ans1;
    $_SESSION['ques1']=$ans2;
    $_SESSION['ques2']=$ans3;
    $_SESSION['ques3']=$ans4;
    $_SESSION['ques4']=$ans5;
  $total_Points=(int)($ans1+$ans2+$ans3+$ans4+$ans5);
  $_SESSION['total']=$total_Points;
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
        <div class="col-lg-6 offset-lg-3 col-md-12 mt-5">
            <form method="post">
            <?php
                if($_POST && !empty($errors))
                {
                    echo"<div class='col-12 alert alert-danger text-center'>Sorry You should Answer All Questions</div>";
                }
                 ?>
                <table class="table text-center"
                    style="background-color: #212529; font-size:20PX; color:#11aad3; font-weigth:bold; border-radius :10px; text-align:center; ">
                    <thead>
                        <th class="col-4">
                            Question
                        </th>
                        <th class="col-2 text-danger">
                            Bad
                        </th>
                        <th class="col-2 text-warning">
                            Good
                        </th>
                        <th class="col-2 text-success">
                            veryGood
                        </th>
                        <th class="col-2 text-success">
                            excellent
                        </th>
                    </thead>
                    <tr>
                        <td>
                        Are you satisfied with the level of cleanliness?
                        </td>

                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name='ques0' value="0"  <?php if($_POST && !empty($errors)){get_check(0,$ans1);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques0" value="3" <?php if($_POST && !empty($errors)){get_check(3,$ans1);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques0" value="5" <?php if($_POST && !empty($errors)){get_check(5,$ans1);}?>>
 
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques0" value="10" <?php if($_POST && !empty($errors)){get_check(10,$ans1);}?>>

                            </div>
                        </td>
                  
                        
                    </tr>
                    <tr>
                        <td>
                        Are you satisfied with the service prices?
                        </td>

                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name='ques1' value="0" <?php    if($_POST && !empty($errors)){get_check(0,$ans2);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques1" value="3" <?php     if($_POST && !empty($errors)){get_check(3,$ans2);}?>>
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques1" value="5" <?php     if($_POST && !empty($errors)){get_check(5,$ans2);}?>>
 
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques1" value="10" <?php     if($_POST && !empty($errors)){get_check(10,$ans2);}?>>

                            </div>
                        </td>
                  
                        
                    </tr>
                    <tr>
                        <td>
                        Are you satisfied with the nursing service?
                        </td>

                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name='ques2' value="0" <?php    if($_POST && !empty($errors)){get_check(0,$ans3);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques2" value="3" <?php     if($_POST && !empty($errors)){get_check(3,$ans3);}?>>
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques2" value="5" <?php     if($_POST && !empty($errors)){get_check(5,$ans3);}?>>
 
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques2" value="10" <?php     if($_POST && !empty($errors)){get_check(10,$ans3);}?>>

                            </div>
                        </td>
                  
                        
                    </tr>
                    <tr>
                        <td>
                        Are you satisfied with the level of the doctor?
                        </td>

                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name='ques3' value="0" <?php    if($_POST && !empty($errors)){get_check(0,$ans4);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques3" value="3" <?php     if($_POST && !empty($errors)){get_check(3,$ans4);}?>>
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques3" value="5" <?php     if($_POST && !empty($errors)){get_check(5,$ans4);}?>>
 
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques3" value="10" <?php     if($_POST && !empty($errors)){get_check(10,$ans4);}?>>

                            </div>
                        </td>
                  
                        
                    </tr>
                    <tr>
                        <td>
                        Are you satisfied with the calmness in the hospital?
                        </td>

                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name='ques4' value="0" <?php    if($_POST && !empty($errors)){get_check(0,$ans5);}?> >
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques4" value="3" <?php     if($_POST && !empty($errors)){get_check(3,$ans5);}?>>
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques4" value="5" <?php     if($_POST && !empty($errors)){get_check(5,$ans5);}?>>
 
                            </div>
                        </td>
                        <td>
                            <div class="radio-toolbar">
                                <input type="radio" name="ques4" value="10" <?php     if($_POST && !empty($errors)){get_check(10,$ans5);}?>>

                            </div>
                        </td>
                  
                        
                    </tr>

                
             
                </table>
                

                <div class="form-group row col-6 offset-3 ">
                    <button class="btn col-12 mt-3 p-3 align-center  rounded"
                        style="color: #11aad3; font-weight:bold; background-color:#212529; ">
                        Next
                    </button>
                
                </div>
                <?php 
                    
                    if($_POST){
                        if(!isset($_POST["ques0"]) || $_POST["ques0"]=="")
                        {
                            echo $errors['ques0-required'];
                        }
                        if(!isset($_POST["ques1"]) || $_POST["ques1"]=="")
                        {
                            echo $errors['ques1-required'];
                        }
                        if(!isset($_POST["ques2"]) || $_POST["ques2"]=="")
                        {
                            echo $errors['ques2-required'];
                        }
                        if(!isset($_POST["ques3"]) || $_POST["ques3"]=="")
                        {
                            echo $errors['ques3-required'];
                        }
                        if(!isset($_POST["ques4"]) || $_POST["ques4"]=="")
                        {
                            echo $errors['ques4-required'];
                        }
                    }?>
                
            </form>
        </div>
    </div>
</div>
<?php if($_POST){if(empty($total_Points)) {
                                      echo $errors['number-required'];
                                    }
                                    else
                                    {
                                        header("location:result.php");}}
                                ?>



<?php include "layout/footer.php"; ?>




   