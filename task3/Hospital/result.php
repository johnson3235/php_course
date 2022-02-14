<?php
$title="Result";
include "layout/header.php";
function res($value){
    if($value==0)
    {
        echo"Bad";
    }
    elseif($value==3)
    {
        echo"Good";
    }
    elseif($value==5)
    {
        echo"VeryGood";
    }
    elseif($value==10)
    {
        echo"Excellent";
    }

}
if($_POST)
{
    $errors = [];
//     $number=$_POST['number'];
//   if(empty($_POST['number'])){
//     $errors['number-required'] =  "<div class='alert alert-danger'> Number Is Required </div>";
//   }

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
            <img class="img w-75" src="img/review.png" alt=" Home">
        </div>
        <div class="col-lg-6 col-md-12 mt-5">
            <form method="post">
                <div class="column form-group">
                    <div class="row col-12 mt-3 ">
                        <div class="col-8 mt-2 offset-2">
                            <table  class="table"                    style="background-color: #212529; font-size:20PX; color:#11aad3; font-weigth:bold; border-radius :10px; text-align:center; ">
>
                                <thead>
                                    <th>
                                        Question number :
                                    </th>
                                    <th>
                                        Answer :
                                    </th>
                                    <tr>
                                        <td class="col-6">Q1</td>
                                        <td class="col-6"><?php res($_SESSION['ques0'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Q2</td>
                                        <td><?php res($_SESSION['ques1'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Q3</td>
                                        <td><?php res($_SESSION['ques2'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Q4</td>
                                        <td><?php res($_SESSION['ques3'])?></td>
                                    </tr>
                                    <tr>
                                        <td>Q5</td>
                                        <td><?php res($_SESSION['ques4'])?></td>
                                    </tr>
                                </thead>
                            </table>
                            <?php
                            if($_SESSION['total']>=25){
                                echo"<div class='alert alert-success text-center'>Thank you For Reviewing Best Wishes";
                            }
                            else
                            {
                                echo"<div class='alert alert-danger text-center'>We Will Call you on This Number ".$_SESSION['number']." To Know How Will Solve This Problem</div>";
                            }

                            ?>
                        </div>
                    </div>
                </div>
              

            </form>
        </div>
    </div>
</div>





<?php include "layout/footer.php"; ?>