<?php
// dynamic table
// dynamic rows
// dynamic columns
// check if gender of user == m ==> male
// check if gender of user == f ==> female


// collection => laravel => array of objects
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" =>(object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],
  
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ],

    ], 
];

?>

<!doctype html>
<html lang="en">
  <head>
    <title>Dynamic Table</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
    *{
        text-transform: capitalize;
    } 
    td,tr{
        margin: 10px;
    }</style>
  </head>
  <body>
  <h1 class="text-center text-success">
                    Dynamic Table Show
                </h1>
    <table class="offset-2 mt-3 col-8 " style="background-color: darkcyan; font-size:20PX; color:white; font-weigth:bold; border-radius :10px; text-align:center; ">
        <thead>
        <?php foreach ($users[0] as $key=>$value) {
   
                        echo "<th class='col-2' style=' background-color:gray; color:white; padding:30px'  value='$key'> $key </th>";
        
                    } ?>
        </thead>
        <tbody>
            <?php
    foreach ($users as $index=>$user) { if (is_object($user)){?>
      
        <tr class="mt-3">
      <?php
       foreach ($user as $key=>$value) {
           if($key=="gender")
           { if(is_object($user->$key)){
            if($user->$key->$key == 'm')
            {
                $value="Male";
                echo "<td> $value</td>";
            }
            elseif($user->$key->$key == 'f'){
                $value="Female";
                echo "<td> $value</td>";
            }
        }
        else
        {
            echo "<td>  </td>";
        }
           }
           elseif($key=="hobbies")
           {
               ?>
               <td class="mt-3"> <?php
            foreach($user->$key as $index=>$hobby ){if (is_array($user->$key) && !is_object($hobby)){
                echo "$hobby  , ";
            }
            else
        {
            echo "<td>  </td>";
        }
            }
            ?>
            </td>
            <?php
           }
           elseif($key=="activities")
           {
            ?>
            <td  class="mt-3"> <?php
         foreach($user->$key as $key2=>$activity ){if (is_array($user->$key)  && !is_object($activity)) {
             echo "In $key2 => $activity , <br>";
         }
         else
        {
            echo "<td>  </td>";
        }
         }
         ?>
         </td>
         <?php
           }
           else
           {
            echo "<td> $value</td>";
           }
       }
       ?>
       </tr>
      
          <?php }}?>
           
        </tbody>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>



<!-- 
$users = [
    (object)[
        'id' => 1,
        'name' => 'ahmed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'football', 'swimming', 'running'
        ],
        'activities' => [
            "school" => 'drawing',
            'home' => 'painting'
        ],
        
    ],
    (object)[
        'id' => 2,
        'name' => 'mohamed',
        "gender" => (object)[
            'gender' => 'm'
        ],
        'hobbies' => [
            'swimming', 'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ],
    (object)[
        'id' => 3,
        'name' => 'menna',
        "gender" => (object)[
            'gender' => 'f'
        ],
        'hobbies' => [
            'running',
        ],
        'activities' => [
            "school" => 'painting',
            'home' => 'drawing'
        ]
    ],
    
]; -->