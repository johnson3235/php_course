<?php
function check_price($elec_used){
if($elec_used<=50){
return .5;
}
elseif($elec_used<=150 && $elec_used>50){
  return .75;
}
elseif($elec_used<=250 && $elec_used>150){
  return 1.2;
}
else{
    return 1.5;
}
}
if ($_POST) { 
    $color="success";
    $elec_input=$_POST['elec_input'];
    $price=check_price($elec_input);
    $tax_cost=(((float)$elec_input)*.2);
    $total_cost=((float)$elec_input*$price);
    $final_cost=$total_cost+$tax_cost;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Get Cost</title>
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
                    Calculate electric cost
                </h1>
            </div>
            <div class="col-12 offset-0">
                <form method="post">
                    <div class="column form-group offset-4">
                        <div class="row col-6 mt-3">
                            <div class="col-12">
                                <input type="number" name="elec_input" id="num1" class="form-control" min="0" 
                                    placeholder="Please Electric Unit :" aria-describedby="helpId"step="any">
                            </div>
    
                        </div>
  
                    </div>
                    <div class="form-group row col-4 offset-4">
                        <button class="col-12 mt-3 align-center  btn btn-dark rounded "> Get Cost: </button>
                    </div>
                </form>
                <?php 
                if(isset($elec_input) && $elec_input!=""){
                    echo "<div class='alert alert-$color offset-4 col-4 '> The electirc units used = $elec_input, <br> price unit  = $price ,<br> tax  20% will add on bill = $tax_cost , <br> cost without Tax <strong> $total_cost</strong> , after Add Tax <br> Final cost = <strong>$final_cost</strong> </div>";
                }
                ?>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>