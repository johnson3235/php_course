<?php
$loc_option=[
    'Cairo'=>0,
    'Giza'=>30,
    'Alex'=>50,
    'Others'=>100
];
function clac_cost($total_cost)
{
  if($total_cost>4500)
  {
    return $total_cost*.2;
  }
  elseif($total_cost<=4500 && $total_cost>3000){
    return $total_cost*.15;
  }
  elseif($total_cost<=3000 && $total_cost>=1000)
  {return $total_cost*.1;}
  else
{
  return $total_cost*0;
}
}

if($_POST)
{
  $pages_array[] = (object) array('name' => '', 'price' => 0,'quantity'=>0);
    $errors = [];
    $total_cost=0;
    $dis_cost=0;
    $name=$_POST['name'];
    $loc=$_POST['loc'];
    $num_product=$_POST['num_product'];

  if(empty($_POST['name'])){
    $errors['name-required'] =  "<div class='alert alert-danger'> Name Is Required </div>";
  }
  if(isset($_POST['loc']) && $_POST['loc']==''){
    $errors['loc-required'] =  "<div class='alert alert-danger'> location Is Required </div>";
  }
  if(empty($_POST['num_product'])){
    $errors['num_product-required'] =  "<div class='alert alert-danger'> Number of Product Is Required </div>";
  }


}
?>
<!doctype html>
<html lang="en">

<head>
    <title>Supermarket</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-color: #e5f6fe;">
    <nav class="navbar">
        <a class="navbar-brand" href="supermarket.php">
            <img src="img/brand.png" width="60" height="60" class="d-inline-block align-top" alt="supermarket_Brand">
            <span style=" color: var(--text2-color); font-weight:bold;">SuperMarket</span>
        </a>
    </nav>
    <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center">
                    Market
                </h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-6 ">
                <img class="img w-100" src="img/home.png" alt=" Home">
            </div>
            <div class="col-lg-6 col-md-12 mt-5">
                <form method="post">
                    <div class="column form-group">
                        <div class="row col-12 mt-3 ">
                            <div class="col-8 mt-2 offset-2">
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Please Enter username" aria-describedby="helpId"
                                    value="<?php if(!empty($name)){echo $name;}?>">
                                <?php if($_POST){ if(empty($name)) {
                                      echo $errors['name-required'];
                                    } }?>
                            </div>

                            <div class="col-8 mt-2 offset-2">
                                <input type="number" name="num_product" id="num_product" class="form-control" step="1"
                                    min="0" placeholder="Please Enter number of product" aria-describedby="helpId"
                                    value="<?php if(!empty($num_product)){echo $num_product;}?>">
                                <?php if($_POST){ if(empty($num_product)) {
                                      echo $errors['num_product-required'];
                                    }} ?>
                            </div>
                            <div class=" col-8 form-group mt-2 offset-2">

                                <select class="form-select form-select-lg mb-3 col-6 p-2" name="loc">
                                    <?php foreach($loc_option as $key=>$value)
                                  {?>
                                    <option <?php if(isset($loc))
                                    {
                                      if($value==$loc)
                                      {
                                        echo "selected";
                                      }
                                    } ?> name='loc' id='loc' value='<?php echo $value; ?>'><?php echo $key?></option>
                                    <?php
                                  }
                                  ?>
                                    <?php if($_POST){ if(empty($loc)) {
                                      echo $errors['loc-required'];
                                    }} ?>
                                </select>


                            </div>

                        </div>
                    </div>
                    <div class='col-8 offset-2'
                        style="display:<?php if(!empty($num_product)){ echo "block";}else{echo 'none';} ?>;">
                        <table class='table table-striped text-center'>
                            <thead>
                                <th>
                                    Product_Name
                                </th>
                                <th>
                                    Price
                                </th>
                                <th>
                                    Quantity
                                </th>
                            </thead>
                            <?php
                  $i=0;
                  while($num_product>$i)
                  {?>

                            <tr>
                                <td> <input type='text' class='form-control' name='<?php echo "name$i";?>'
                                        value="<?php if(!empty($_POST["name$i"])){echo $_POST["name$i"];}?>"> </td>
                                <td> <input type='number' class='form-control' name='<?php echo "price$i";?>' step='any'
                                        min='0' value="<?php if(!empty($_POST["price$i"])){echo $_POST["price$i"];}?>">
                                </td>
                                <td> <input type='number' class='form-control' name='<?php echo "quantity$i";?>'
                                        step='1' min='1'
                                        value="<?php if(!empty($_POST["quantity$i"])){echo $_POST["quantity$i"];}?>">
                                </td>
                            </tr>
                            <?php
                   $i++;
                  }?>


                        </table>
                        <div class="form-group row col-4 offset-4 ">

                            <?php
                        $i=0;
                        if(!empty($_POST["name$i"])&& !empty($_POST["price$i"]) && !empty($_POST["quantity$i"])){
                        while($num_product>$i)
                        {
                          if(!empty($_POST["name$i"])&& !empty($_POST["price$i"]) && !empty($_POST["quantity$i"])){
                          $pages_array[$i] = (object) array("name" =>$_POST["name$i"], 'price' =>$_POST["price$i"],'quantity'=>$_POST["quantity$i"]);
                          
                          }
                          $i++;
                        }
                      } 
                         ?>
                        </div>
                    </div>

                    <div class="form-group row col-6 offset-3 ">
                        <button class="btn col-12 mt-3 p-3 align-center  rounded  s"
                            style="font-weight: bold; color:var(--text2-color); background-color:var(--main-color); ">
                            Calculate
                        </button>
                        <?php  if($_POST){if(empty($errors)){
    foreach($pages_array as $index=>$object)
    {
      $total_cost=$total_cost+(($object->price) * ($object->quantity));
    }
    
   $dis_cost=clac_cost($total_cost);
   if(count($pages_array)==$num_product)
   {
   echo "<div class='alert alert-success  col-12 '> Name : $name , <br> Location Delivery :  ".array_keys($loc_option,(int)$loc,false)[0]."  so Cost : $loc <table class='table text-center'><thead><th>Product_Name</th><th>Price</th><th>quantity</th></thead>";?><?php
   $i=0;
   while($num_product>$i)
   {?>

             <tr>
                 <td> <input type='text' class='form-control' disabled name='<?php echo "name$i";?>'
                         value="<?php if(!empty($_POST["name$i"])){echo $_POST["name$i"];}?>"> </td>
                 <td> <input type='number' class='form-control'disabled  name='<?php echo "price$i";?>' step='any'
                         min='0' value="<?php if(!empty($_POST["price$i"])){echo $_POST["price$i"];}?>">
                 </td>
                 <td> <input type='number' class='form-control' disabled name='<?php echo "quantity$i";?>'
                         step='1' min='1'
                         value="<?php if(!empty($_POST["quantity$i"])){echo $_POST["quantity$i"];}?>">
                 </td>
             </tr>
             <?php
    $i++;
   }?> <?php echo "</table><br> Total Cost Without Discount : $total_cost , <br> Discount cost : $dis_cost  <br> With Discount : ".($total_cost-$dis_cost)."<br> So the Final Cost : ".(($total_cost-$dis_cost)+$loc)."</div>";
   }
   else
   {
    echo "<div class='alert alert-danger  col-12 '> Enter All Information Of Products </div>";
   }
}
}
 ?>
                    </div>


                </form>



            </div>
        </div>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>