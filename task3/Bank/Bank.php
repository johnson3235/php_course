<?php

if($_POST)
{
    $errors = [];
    $name=$_POST['name'];
    $loan=$_POST['loan'];
    $year=$_POST['year'];
  if(empty($_POST['name'])){
    $errors['name-required'] =  "<div class='alert alert-danger'> name Is Required </div>";
  }
  if(empty($_POST['loan'])){
    $errors['loan-required'] =  "<div class='alert alert-danger'> loan Is Required </div>";
  }
  if(empty($_POST['year'])){
    $errors['year-required'] =  "<div class='alert alert-danger'> years Is Required </div>";
  }

  if(empty($errors)){
  
    $tax=0;
    $tax_cost=0;
    if($year<=3)
    {
        $tax=.10;
    }
    else{
        $tax=.15;
    }
    if(!empty($name) && !empty($loan) && !empty($year))
    {
        $tax_cost=(($tax*(float)$year))*(float)$loan;
        $tax_per_year=$tax_cost/(float)$year;
        $total_repayment=$tax_cost+(float)$loan;
       
    }
  }
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Bank</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/bank.css">
  </head>
  <body>
  <nav class="navbar">
  <a class="navbar-brand" href="Bank.php">
    <img src="img/brand4.png" width="60" height="60" class="d-inline-block align-top" alt="Bank_Brand">
    <span style="color:#fe7970; font-weight:bold;">Bank Loan</span>
  </a>
</nav>
  <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center" style="color:#fe7970;">
                    Bank Loan
                </h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 ">
                <img class="img w-100" src="img/home.jpg" alt=" Home">
            </div>
            <div class="col-lg-6 col-md-12 mt-5">
                <form method="post">
                    <div class="column form-group">
                        <div class="row col-12 mt-3 ">
                            <div class="col-8 mt-2 offset-2">
                                <input type="text" name="name" id="name" class="form-control" 
                                    placeholder="Please Enter Name" aria-describedby="helpId" value="<?php if(!empty($name)){echo $name;}?>">
                                    <?php if($_POST){ if(empty($name)) {
                                      echo $errors['name-required'];
                                    } }?>
                            </div>
                            <div class="col-8 mt-2 offset-2">
                                <input type="number" name="loan" id="loan" class="form-control" step="any"
                                    placeholder="Please Enter loan" aria-describedby="helpId" value="<?php if(!empty($loan)){echo $loan;}?>">
                                    <?php if($_POST){if(empty($loan)) {
                                      echo $errors['loan-required'];
                                    }} ?>
                            </div>
                            <div class="col-8 mt-2 offset-2">
                                <input type="number" name="year" id="year" class="form-control" step=".5"
                                    placeholder="Please Enter number of Years" aria-describedby="helpId" value="<?php if(!empty($year)){echo $year;}?>">
                                    <?php if($_POST){ if(empty($year)) {
                                      echo $errors['year-required'];
                                    }} ?>
                            </div>

                        </div>
                    </div>
                    <div class="form-group row col-4 offset-4 ">
                        <button class="btn col-12 mt-3 p-3 align-center  rounded " style="font-weight: bold;"> Calculate </button>
                    </div>
                </form><?php
                if(empty($errors) && $_POST){
                echo"
                <div class='col-8 offset-2'><table class='table table-striped text-center' >
                    <tr>
                      
                        <td>your name : </td>
                        <td>$name</td>
                    
                    </tr>
                    <tr>
                    <td>loan_cost : </td>
                        <td>$loan</td>
                    </tr>
                    <tr>

                    <td>
                    Time repayment : 
                    </td>
                    <td>$year Year</td>
                    </tr>
                    <tr>
                        <td>
                    tax_cost INYear : 
                    </td>
                    <td>$tax_per_year $</td>
                    </tr>
                    <tr>
                    <td>
                     total tax_cost : 
                    </td>
                    <td>$tax_cost $</td>
                    </tr>
                    <tr>
                    <td>
                     Total Payment : 
                    </td>
                    <td>$total_repayment</td>
                    </tr>
                </table></div>
                ";}?>
               
            </div>
        </div>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>