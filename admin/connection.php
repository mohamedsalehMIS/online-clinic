<?php 

  $server   = "localhost";
  $userName = "root";
  $password = "";
  $dbName   = "clinic";


    $con =  mysqli_connect($server, $userName, $password, $dbName);

    if(!$con){
        
        echo "error in connection " . mysqli_connect_error();
    }

    


?>