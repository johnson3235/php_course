<?php
function check_color_back($grade) {
    if($grade>=90)
    {
        return "success";
    }
    elseif($grade>=80 &&$grade<90 ){
        return "success";
    }
    elseif($grade>=70 &&$grade<80){
        return "success";
    }
    elseif($grade>=60 &&$grade<70){
        return "warning";
    }
    elseif($grade>=40 &&$grade<70){
        return "warning";
    }
    else{
        return "danger";
    }
  }

  function check_color($grade) {
    if($grade>=90)
    {
        return "green";
    }
    elseif($grade>=80 &&$grade<90 ){
        return "green";
    }
    elseif($grade>=70 &&$grade<80){
        return "green";
    }
    elseif($grade>=60 &&$grade<70){
        return "orange";
    }
    elseif($grade>=40 &&$grade<70){
        return "orange";
    }
    else{
        return "red";
    }
  }
function Grade($grade) {
    if($grade>=90)
{
    return "A";
}
elseif($grade>=80 &&$grade<90 ){
    return "B";
}
elseif($grade>=70 &&$grade<80){
    return "C";
}
elseif($grade>=60 &&$grade<70){
    return "D";
}
elseif($grade>=40 &&$grade<70){
    return "E";
}
else{
    return "F";
}
  }

if ($_POST) { 
    $color = "success";

    $phy=($_POST['physics']);
    $phy_grade=((int)$phy/50)*100;

    $che=($_POST['chemistry']);
    $che_grade=((int)$che/50)*100;

    $bio=($_POST['biology']);
    $bio_grade=((int)$bio/50)*100;
    
    $math=($_POST['mathematics']);
    $math_grade=((int)$math/50)*100;
    
    $com=($_POST['computer']);
    $com_grade=((int)$com/50)*100;

    $total=(((int)$_POST['physics']+(int)$_POST['chemistry']+(int)$_POST['biology']+(int)$_POST['mathematics']+(int)$_POST['computer']));
    $total_grade=(((int)$total)/250)*100;

   

      $phy_grades=Grade($phy_grade);
      $che_grades=Grade($che_grade);
      $bio_grades=Grade($bio_grade);
      $math_grades=Grade($math_grade);
      $com_grades=Grade($com_grade);
      $color=check_color_back($total_grade);
      $total_grades=Grade($total_grade);
 
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Calculate Grade</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center text-danger">
                    Calculate Grade
                </h1>
            </div>
            <div class="col-12 offset-0">
                <form method="post">
                    <div class="column form-group offset-4">
                        <div class="row col-6">
                            <div class="col-8">
                                <label for="physics" class="label mt-3 <?php $color?>">Physics Grade
                                    :<?php if(isset($phy) && $phy!=""){echo "<span style='font-weight:bold;'> $phy_grade % </span>";}?></label>
                                <input type="number" name="physics" id="physics" class="form-control" min="0" step="any" max="50"
                                    placeholder="Please Enter physics" aria-describedby="helpId" required>
                            </div>
                            <div class="col-4">
                                <label for="physics" class="label mt-3">Result :</label>
                                <input type="text"
                                    style="color:white; font-weight:bolder; background-color:<?php if(isset($phy)&& $phy!=""){echo check_color($phy_grade);}?>;"
                                    class="form-control text-center" aria-describedby="helpId" disabled
                                    value="<?php if(isset($phy)&& $phy!=""){echo"$phy_grades";}?>">
                            </div>
                        </div>

                        <div class="row col-6">
                            <div class="col-8">
                                <label for="chemistry" class="label mt-3">Chemistry Grade
                                    :<?php if(isset($che) && $che!=""){echo "<span style='font-weight:bold;'> $che_grade % </span>";};?></label>
                                <input type="number" name="chemistry" id="chemistry" class="form-control  " min="0"step="any"
                                    max="50" placeholder="Please Enter chemistry" aria-describedby="helpId" required>
                            </div>
                            <div class="col-4">
                                <label for="chemistry" class="label mt-3">Result :</label>
                                <input type="text"
                                    style="color:white; font-weight:bolder; background-color:<?php if(isset($che)&& $che!=""){echo check_color($che_grade);}?>;"
                                    class="form-control text-center danger" aria-describedby="helpId" disabled
                                    value="<?php if(isset($che)&& $che!=""){echo"$che_grades";}?>">
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-8">
                                <label for="biology" class="label mt-3">Biology Grade
                                    :<?php if(isset($bio) && $bio!=""){echo "<span style='font-weight:bold;'> $bio_grade % </span>";};?></label>
                                <input type="number" name="biology" id="biology" class="form-control  " min="0" max="50"step="any"
                                    placeholder="Please Enter biology" aria-describedby="helpId" required>
                            </div>
                            <div class="col-4">
                                <label for="biology" class="label mt-3">Result :</label>
                                <input type="text" class="form-control text-center"
                                    style="color:white; font-weight:bolder; background-color:<?php if(isset($bio)&& $bio!=""){echo check_color($bio_grade);}?>;"
                                    aria-describedby="helpId" disabled
                                    value="<?php if(isset($bio)&& $bio!=""){echo"$bio_grades";}?>">
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-8">
                                <label for="mathematics" class="label mt-3">Mathematics Grade
                                    :<?php if(isset($math)&& $math!=""){echo "<span style='font-weight:bold;'> $math_grade % </span>";};?></label>
                                <input type="number" name="mathematics" id="mathematics" class="form-control  " min="0"step="any"
                                    max="50" placeholder="Please Enter mathematics" aria-describedby="helpId" required>
                            </div>
                            <div class="col-4">
                                <label for="mathematics" class="label mt-3">Result :</label>
                                <input type="text" class="form-control text-center"
                                    style="color:white; font-weight:bolder; background-color:<?php if(isset($math)&& $math!=""){echo check_color($math_grade);}?>"
                                    aria-describedby="helpId" disabled
                                    value="<?php if(isset($math)&& $math!=""){echo"$math_grades";}?>">
                            </div>
                        </div>
                        <div class="row col-6">
                            <div class="col-8">
                                <label for="computer" class="label mt-3">Computer Grade
                                    :<?php if(isset($com)&& $com!=""){echo "<span style='font-weight:bold;'> $com_grade % </span>";};?></label>
                                <input type="number" name="computer" id="computer" class="form-control  " min="0"step="any"
                                    max="50" placeholder="Please Enter computer" aria-describedby="helpId" required>
                            </div>
                            <div class="col-4">
                                <label for="computer" class="label mt-3">Result :</label>
                                <input type="text" class="form-control text-center"
                                    style=" color:white; font-weight:bolder; background-color:<?php if(isset($com)&& $com!=""){echo check_color($com_grade);}?>"
                                    aria-describedby="helpId" disabled
                                    value="<?php if(isset($com)&& $com!=""){echo"$com_grades";}?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-group row col-4 offset-4">
                        <button class="col-12 mt-3 align-center  btn btn-dark rounded "> Get Grade : </button>
                    </div>
                </form>
                <?php 
                if(isset($total)){
                    echo "<div class='alert alert-$color offset-3 col-6'> The Total Grades  $total_grade% => $total_grades </div>";
                }
                ?>
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