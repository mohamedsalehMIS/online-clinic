
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php getTitle() ?></title>
        <link rel="icon" href="<?php echo $images;?>logo-icon.png">
        <link rel="stylesheet" href="<?php echo $css;?>bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $css;?>style.css">
    </head>
    </html>
    <body>
        <nav class="navbar navbar-expand-lg sticky-top nav-sticky navbar-dark bg-primary">
            <div class="container">
                <a class="navbar-brand" href="index.php">
                <img src="<?php echo $images;?>logo-icon.png" alt="" width="30" height="24" class="d-inline-block align-text-top">
                    Doctor
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="appointment.php">Appointment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="about.php">About Us</a>
                        </li>
                    </ul>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3">
                        <input type="search" class="form-control" placeholder="Search...">
                    </form>
                </div>
            </div>
        </nav>
        <!-- End navbar -->
