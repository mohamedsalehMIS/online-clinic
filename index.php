<?php   
    $pageTitle = 'HOME';
    require 'initialize.php';

?>
<!-- Start SECTION Header -->
<div class="header">
    <div class="overlay"></div>
    <div class="hero">
        <div class="container">
            <div class="row">
                <div class="col-8 ps-5">
                    <img class="col-1" src="<?php echo $images;?>logo-icon.png" alt="logo">
                    <h1>Meet the <br> Best doctor</h1>
                    <p class="lead">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil quasi ipsum tempore dolor deleniti magni, quos voluptatibus odio sed alias, a aspernatur cumque. Sapiente sint dolorem nam eum odit praesentium.</p>
                    <a href="appointment.php" type="button" class="btn btn-primary">Make Appointment</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End SECTION Header -->

        
<?php 

    include $templates . 'footer.php'; 

?>
