<?php
if ($_POST) { 
    $color="success";


    $num1=$_POST['num1'];
    $num2=$_POST['num2'];
    $num3=$_POST['num3'];
    if($num1>=$num2 && $num1>=$num3){$max=$num1;}
    elseif(($num2>=$num1 && $num2>=$num3)){$max=$num2;}
    else{$max=$num3;}

    if($num1<=$num2 && $num1<=$num3){$min=$num1;}
    elseif(($num2<=$num1 && $num2<=$num3)){$min=$num2;}
    else{$min=$num3;}


}
?>





<!doctype html>
<html lang="en">
  <head>
    <title>Max and Min</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center text-danger">
                    Calculate Max and Min 
                </h1>
            </div>
            <div class="col-12 offset-0">
                <form method="post">
                    <div class="column form-group offset-4">
                        <div class="row col-6 mt-3">
                            <div class="col-12">
                                <input type="number" name="num1" id="num1" class="form-control"  step="any"
                                    placeholder="Please Enter number1" aria-describedby="helpId" required>
                            </div>
    
                        </div>
                        <div class="row col-6 mt-3">
                            <div class="col-12 mt-2">
                                <input type="number" name="num2" id="num2" class="form-control" step="any"
                                    placeholder="Please Enter number2" aria-describedby="helpId" required>
                            </div>
                        </div>
                        <div class="row col-6 mt-3">
                            <div class="col-12">
                                <input type="number" name="num3" id="num3" class="form-control"  step="any"
                                    placeholder="Please Enter number3" aria-describedby="helpId" required>
                            </div>
    
                        </div>
                       
                        
                    </div>
                    <div class="form-group row col-4 offset-4">
                        <button class="col-12 mt-3 align-center  btn btn-dark rounded "> Get Grade : </button>
                    </div>
                </form>
                <?php 
                if(isset($max) && isset($min)){
                    echo "<div class='alert alert-$color offset-3 col-6'> The Max Number = <strong>$max</strong> , <br> The Min Number = <strong> $min </strong> </div>";
                }
                ?>
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