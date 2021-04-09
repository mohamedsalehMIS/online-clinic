<?php 
    require 'initialize.php';

   $id = filter_var($_GET['category_id'],FILTER_SANITIZE_NUMBER_INT);

    $sql = "delete from categories where category_id = " . $id;

    $op = mysqli_query($con,$sql);

    $message = '';

    if($op){ 

          $message = "Record Delete";

    }else{

        $message = "error in delete";

    }


    $_SESSION['message'] = $message;

    header("Location: categories.php");


?>