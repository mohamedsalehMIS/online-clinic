<?php

    session_start();
    if (isset($_SESSION['superAdmin'])) {
    $pageTitle = 'Departments';

    include 'initialize.php';

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $ErrorMessage = [];

        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
        
        if(empty($title) || $title > 50){

        $ErrorMessage [] = 'title cant be empty or more than 50 chars';

        }else{

            $pattern  = "/^[a-zA-Z\s*]+$/";

            if(!preg_match($pattern,$title)){

                
                $ErrorMessage[] = "inValid String";

            }else{

                
                $sql = "select category_id from categories where title ='$title'";
                $count = mysqli_num_rows(mysqli_query($con,$sql));

                if($count == 1){

                    $ErrorMessage[] = "Title Used Before";

                }else{

                    $sql = "insert into categories (title) values ('$title')";

                    $op =  mysqli_query($con,$sql);


                    if($op){

                        $message = "Data inserted";
                    }
                }

            }

        }
        $_SESSION['error'] = $ErrorMessage;

}
?>

<div class="card-body">
    <a class="btn btn-primary" href="categories.php">Back</a>
    <form class="col-6 mx-auto" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Title</label>
            <input class="form-control py-4"  name="title" id="inputEmailAddress" type="text" placeholder="Enter Role title"  required />
        </div>

        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" class="btn btn-primary" value="add"> 
        </div>
        <?php 
                                        
            if(isset($_SESSION['error'])) {
                foreach ($_SESSION['error'] as $value) {
                    # code...
                    echo '<div class="alert alert-danger" role="alert">'
                    . $value .
                    '</div>';
                }
            }
        ?>
    </form>
</div>


<?php
    include $templates . 'footer.php';
?>

<?php
    }
?>