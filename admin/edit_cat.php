<?php

    session_start();
    if (isset($_SESSION['superAdmin'])) {
    $pageTitle = 'Departments';

    include 'initialize.php';

    if($_SERVER['REQUEST_METHOD'] == "GET"){

        $cat_id  =  filter_var($_GET['category_id'],FILTER_SANITIZE_NUMBER_INT);
    
        $sql = "select * from categories where category_id = " . $cat_id;

        $op = mysqli_query($con,$sql);
    
    
        if(mysqli_num_rows($op) == 0){
    
            $_SESSION['Message'] = "no Category founded with this id";
        
    
            header('Location: categories.php'); 

        }else{
        
        $data = mysqli_fetch_assoc($op);
    
        }

    
    }
    

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $ErrorMessage = [];

        $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);

        $cat_id = filter_var($_POST['category_id'], FILTER_SANITIZE_NUMBER_INT);
        
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

                    $sql = "update categories  set  title ='$title'  where category_id=".$cat_id;

                    $op =  mysqli_query($con,$sql);


                    if($op){

                        $message = "Data inserted";
                    }
                }

            }

        }
        $_SESSION['error'] = $ErrorMessage;

        header('Location: categories.php');

}
?>
<div class="card-body">
    <form  action="<?php htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post">
        <div class="form-group">
            <label class="small mb-1" for="inputEmailAddress">Title</label>
            <input class="form-control py-4"  name="title"  value="<?php if(isset($data['title'])){ echo $data['title'];}?>" id="inputEmailAddress" type="text" placeholder="Enter Role title"  required />
        </div>
        <input type="hidden"  name="category_id" value="<?php if(isset($data['category_id'])){ echo $data['category_id'];}?>">
        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
            <input type="submit" class="btn btn-primary" value="Save"> 
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