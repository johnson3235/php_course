<?php
function op($value,$num1,$num2)
{
   if($value=="add")
   {return add($num1,$num2);}
   elseif($value=="subtract")
   { return subtract($num1,$num2);}
   elseif($value=="multi")
   {return multi($num1,$num2);}
   elseif($value=="div")
   {return div($num1,$num2);}
   elseif($value=="mod")
   {return mod($num1,$num2);}
   elseif($value=="pow")
   {
       return power($num1,$num2);
   }
}

function add($num1,$num2)
{
    return (float)$num1 + (float)$num2;
}
function subtract($num1,$num2)
{
    return (float)$num1 - (float)$num2;
}
function multi($num1,$num2)
{
    if($num2==""){
        return $num1;
      }else{
        return (float)$num1 * (float)$num2;
      }
   
}
function div($num1,$num2)
{
    if($num2==""){
      return $num1;
    }else{
        return (float)$num1 / (float)$num2;
    }
   
}
function mod($num1,$num2)
{
    if($num2==""){
        return $num1;
      }else{
        return (float)$num1 % (float)$num2;
      }
    
}
function power($num1,$num2){
    if($num2==""){
        return $num1;
      }else{
        return pow((float)$num1,(float)$num2);
      }
}
if ($_POST) {   
 $num1=$_POST['num1'];
 $num2=$_POST['num2'];
$ope=$_POST['op'];
$final=op($ope,$num1,$num2);

}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Calculator</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    .btn {
        background-color: gray;
        color: white;
        font-weight: bold;
        font-size: 20px;
        text-align: center;
        width: 100%;
        cursor: pointer;
    }

    * {
        border: 0;
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    :root {
        --bg: #e3e4e8;
        --fg: #17181c;
        --formBg: #fff;
        --radioBg: #fff;
        --radioBgActive: #e3e4e8;
        --radioBorder: #c7cad1;
        --radioBorderActive: #c7cad1;
        --radioSide: #c7cad1;
        --primary1: #0b46da;
        --primary2: #255ff4;
        --primary3: #5583f6;
        --primary4: #86a6f9;
        --depth: -4.5em;
        --ballDiam: 0.75em;
        --xAngle: -30deg;
        --yAngle: 45deg;
        font-size: calc(16px + (24 - 16)*(100vw - 320px)/(1280 - 320));
    }

    body {
        color: var(--fg);
        font: 1em/1.5 Hind, sans-serif;
    }

    body {
        transform-style: preserve-3d;
    }

    body {
        background: var(--bg);
        overflow-x: hidden;
        padding-top: 1.5em;
        height: 100vh;
        text-align: center;
    }

    .radio-toolbar {
        margin: 10px;
    }

    .radio-toolbar input[type="radio"] {
        opacity: 0;
        position: fixed;
        width: 0;
    }

    .radio-toolbar label {
        display: inline-block;
        background-color: darkgray;
        padding: 10px 20px;
        font-family: sans-serif, Arial;
        color: white;
        font-weight: bold;
        border: 2px solid #444;
        border-radius: 4px;
        width: 100%;
        cursor: pointer;
    }

    .radio-toolbar label:hover {
        background-color: #dfd;
        color: darkgray;
    }

    .radio-toolbar input[type="radio"]:focus+label {
        border: 2px dashed #444;
    }

    .radio-toolbar input[type="radio"]:checked+label {
        background-color: #bfb;
        border-color: #4c4;
    }
    </style>
</head>

<body>

    <div class="contianer">
        <div class="row mt-5">
            <div class="col-12">
                <h1 class="text-center text-danger">
                    Calculator
                </h1>
            </div>
            <div class="col-12 offset-0">
                <form method="post">
                    <div class="column form-group offset-4">
                        <div class="row col-6 mt-3">
                            <div class="col-12">
                                <input type="number" step="any"
                                    style="background-color: gray; font-size:20px; font-weight:bold; color:white; text-align:center;"
                                    name="final" id="final" class="form-control" aria-describedby="helpId" disabled
                                    value="<?php if(isset($final) && $final !=""){echo $final;}?>">
                            </div>
                        </div>
                        <div class="row col-6 mt-3">
                            <div class="col-lg-6 col-md-6 col-12 mt-3">
                                <input type="number" step="any"
                                    style="background-color: white; font-size:20px; font-weight:bold; color:black;"
                                    name="num1" id="num1" class="form-control" aria-describedby="helpId" placeholder="Enter Number1">
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 mt-3">
                                <input type="number"
                                    style="background-color: white; font-size:20px; font-weight:bold; color:black;"
                                    name="num2" id="num2" class="form-control" aria-describedby="helpId" placeholder="Enter Number2">
                            </div>

                        </div>

                    </div>
                    <div class="column form-group offset-4">
                        <div class="row col-6 mt-3 justifiy-content-evenly">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="add" value="add" checked="true">
                                    <label for="add">+</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="subtract" value="subtract">
                                    <label for="subtract">-</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="multi" value="multi">
                                    <label for="multi">*</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="div" value="div">
                                    <label for="div">/</label>
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="mod" value="mod">
                                    <label for="mod">%</label>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">

                                <div class="radio-toolbar">
                                    <input type="radio" name="op" id="pow" value="pow">
                                    <label for="pow">^</label>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="form-group row col-4 offset-4">
                <button class="col-12 mt-3 align-center  btn btn-dark rounded "> =</button>
            </div>
            </form>
            
        </div>
    </div>
    </div>
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