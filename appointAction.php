<?php
    
    session_start();
    // chech if user coming from HTTP Post request
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require 'initialize.php';

        // array to check if form do not have errors 
		$formErrors = array();

        $name               = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $depart_name        = filter_var($_POST['dep_name'], FILTER_SANITIZE_STRING);
        $dr_name            = filter_var($_POST['dr_name'], FILTER_SANITIZE_STRING);
        $email              = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        $phone              = $_POST['phone'];
        $date               = filter_var($_POST['date'], FILTER_SANITIZE_STRING);
        $address            = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
        $comments           = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);

        if (strlen($name) < 4) {

			$formErrors[] = 'your name must be more than<strong>4 charcters</strong>';
		}
		if (empty($depart_name)) {

			$formErrors[] = 'you must be choose the <strong>department</strong>';
		}
		if (empty($dr_name)) {

			$formErrors[] = 'you must be choose the <strong>Doctor</strong>';
		}
		if (empty($email)) {
            
            $formErrors[] = 'Please insert your<strong>Email</strong>';
		}
        if(filter_var($email,FILTER_VALIDATE_EMAIL) == FALSE){

            $formErrors[] = 'Invali email';
        }
		if (empty($phone) || strlen($phone) > 11) {

			$formErrors[] = 'your phone number is<strong>Required and contain 11 num</strong>';
		}
		if (empty($address)) {

			$formErrors[] = 'your address is<strong>Required</strong>';
		}
		if (!empty(strlen($comments) <= 10)) {

			$formErrors[] = 'your phone number is<strong>Required</strong>';
		}
		
        //check if there is no error proceed the update operation
        if (empty($formErrors)) {

            $query = "insert into patients (name, department, doctor, email, phone, date, address, comment) values('$name','$depart_name','$dr_name', '$email', '$phone', '$date', '$address', '$comments')";

            $result =   mysqli_query($con,$query);

            if($result){

                $Message =  'data inserted ';

            } else  {

                $Message =   'error in insert op';

            }
            
            
        }

        $_SESSION['error'] = $formErrors;

        header('Location: appointment.php');
            

    } else  {

        $errorMessage =  'Error in request method';

        header('Location: register.php?errorMessage=' . $errorMessage);
        }

?>