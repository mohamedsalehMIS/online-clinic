<?php
    session_start();
    $pageTitle = 'Login';
    include 'initialize.php';

    

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $ErrorMessage = [];

        $email    = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $password = $_POST['password']; 



        if(empty($email)){

            $ErrorMessage[] = "email is required";
        }
        if(empty($password)){

            $ErrorMessage[] = "password is required";
        }


        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

            $ErrorMessage[] = "Invalid Email";
        }


        if(strlen($password) < 6){

            $ErrorMessage[] = "password must be more than 6 chars";

        }
    


        if(empty($ErrorMessage)){

            $password = md5($password);

            $sql = "select * from doctors where email='$email' and password='$password'";
            $op = mysqli_query($con,$sql);
            $count = mysqli_num_rows($op);
            if($count == 1){

            $_SESSION['superAdmin'] =  mysqli_fetch_assoc($op);

            header("Location: dashboard.php");

            }else{

                $Message = "error in login";
            }

        }

        $_SESSION['error'] = $ErrorMessage;


    }
?>

<main class="form-signin mt-5">
    <form method="post" action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" class="text-center">
        <img class="mb-4" src="layout/images/logo-icon.png" alt="" width="72" height="67">
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
            <input name="email" type="email" class="form-control" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
        </div>
        <div class="form-floating">
            <input name="password" type="password" class="form-control" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
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
        <p class="mt-5 mb-3 text-muted">© 2017–2021</p>
    </form>
</main>


<?php

    include $templates . 'footer.php';
?>