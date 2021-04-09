<?php
    $pageTitle = 'appointment';
    session_start();
    require 'initialize.php';
    
// chech if user coming from HTTP Post request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    

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

        $query = "insert into users (name, department, doctor, email, phone, date, address, comment) values('$name','$depart_name','$dr_name', '$email', '$phone', '$date', '$address', '$comments')";

        $result =   mysqli_query($con,$query);

        if($result){

            $Message =  'data inserted ';

        } else  {

            $Message =   'error in insert op';

        }
        
        
    }

    $_SESSION['error'] = $formErrors;

    header('Location: appointment.php');
        

} 
?>
        <!-- Section Title -->
        <section class="">
            <div class="container">
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-title text-center">
                            <h3 class="sub-title mb-4">Book an appointment</h3>
                            <p class="para-desc mx-auto text-muted">Great doctor if you need your family member to get effective immediate assistance, emergency treatment or a simple consultation.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section Title -->
        
            
        
        <!-- Section Form registration -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card border-0 shadow rounded overflow-hidden">
                            <ul class="nav nav-pills nav-justified flex-column flex-sm-row rounded-0 shadow overflow-hidden bg-light mb-0" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link rounded-0 active" id="clinic-booking" data-bs-toggle="pill" href="#pills-clinic" role="tab" aria-controls="pills-clinic" aria-selected="false">
                                        <div class="text-center pt-1 pb-1">
                                            <h4 class="title fw-normal mb-0">Clinic Appointment</h4>
                                        </div>
                                    </a><!--end nav link-->
                                </li><!--end nav item-->
                            </ul>
                            
                            <div class="tab-content p-4">
                                <div class="tab-pane fade show active"role="tabpanel" aria-labelledby="clinic-booking">
                                    <form method="POST" action="<?php htmlspecialchars($_SERVER['PHP_SELF']);?>">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Patient Name <span class="text-danger">*</span></label>
                                                    <input name="name" type="text" class="form-control" placeholder="Patient Name :">
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Departments</label>
                                                    <select name="dep_name" class="form-control">
                                                        <option value="0">...</option>
                                                        <?php
                                                            $sql = "select * from categories where 1";
                                                            $op = mysqli_query($con, $sql);
                                                            while($data = mysqli_fetch_assoc($op)) {
                                                                
                                                                echo "<option value='" . $data['category_id'] . "'>" . $data['title'] . "</option>";
                                                            }
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
                                            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Doctor</label>
                                                    <select name="dr_name" class="form-control">
                                                        <option value="0">...</option>
                                                        <?php
                                                            $sql = "select * from doctors where 1";
                                                            $op = mysqli_query($con, $sql);
                                                            while($data = mysqli_fetch_assoc($op)) {
                                                                
                                                                echo "<option value='" . $data['doctor_id'] . "'>" . $data['name'] . "</option>";
                                                            }
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div><!--end col-->
            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Email <span class="text-danger">*</span></label>
                                                    <input name="email" type="text" class="form-control" placeholder="Your email :">
                                                </div> 
                                            </div><!--end col-->
            
                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Your Phone <span class="text-danger">*</span></label>
                                                    <input name="phone" type="number" class="form-control" placeholder="Your Phone :">
                                                </div> 
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Date <span class="text-danger">*</span></label>
                                                    <input name="date" type="date"  class="form-control" placeholder="Date :">
                                                </div> 
                                            </div><!--end col-->

                                            <div class="col-md-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Address <span class="text-danger">*</span></label>
                                                    <input name="address" type="text"  class="form-control" placeholder="your address :">
                                                </div> 
                                            </div><!--end col-->
            
                                            <div class="col-lg-12">
                                                <div class="mb-3">
                                                    <label class="form-label">Comments <span class="text-danger">*</span></label>
                                                    <textarea name="comments" type="text" rows="4" class="form-control" placeholder="Your Message :"></textarea>
                                                </div>
                                            </div><!--end col-->
            
                                            <div class="col-lg-12 mb-5">
                                                <div class="d-grid">
                                                    <button type="submit" class="btn btn-primary">Book An Appointment</button>
                                                </div>
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </form>
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
                                </div>
                            </div>
                        </div>
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end container-->
        </section>
        <!-- Section Form registration -->
        


<?php include $templates . 'footer.php'; ?>