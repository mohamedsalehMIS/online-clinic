<?php
    session_start();
    $pageTitle = 'Dashboard';
    include 'initialize.php';
    if (isset($_SESSION['superAdmin'])) {
        # code...
    
?>






    <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
        <a class="nav-link" href="logout.php">Sign out</a>
        </li>
    </ul>
    </header>

    <div class="container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file"></span>
                        Orders
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="shopping-cart"></span>
                        Products
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="patients.php">
                        <span data-feather="users"></span>
                        Patients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admins.php">
                        <span data-feather="users"></span>
                        doctors
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="bar-chart-2"></span>
                        Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categories.php">
                        <span data-feather="layers"></span>
                        Departments
                        </a>
                    </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                        <span data-feather="plus-circle"></span>
                    </a>
                    </h6>
                    <ul class="nav flex-column mb-2">
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Current month
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Last quarter
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Social engagement
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                        <span data-feather="file-text"></span>
                        Year-end sale
                        </a>
                    </li>
                    </ul>
                </div>
            </nav>

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                </div>
                <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                    <span data-feather="calendar"></span>
                    This week
                </button>
                </div>
            </div>

            <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

            <h2 class="text-center my-5">Patient reservations</h2>
            <div class="table-responsive ">
                <table class="table table-striped table-sm table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Department</th>
                            <th>Doctor</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Date</th>
                            <th>Address</th>
                            <th>Comment</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql = "select users.*, categories.title as catTitle, doctors.name as doc   from users join categories on users.department = categories.category_id  join doctors on users.doctor = doctors.doctor_id   ";

                            $op = mysqli_query($con, $sql);
                            while($data = mysqli_fetch_assoc($op)) {
                                echo '
                                <tr>
                                    <th>' . $data['ID'] . '</th>

                                    <td>' . $data['name'] . '</td>

                                    <td>' . $data['catTitle'] . '</td>

                                    <td>' . $data['doc'] . '</td>

                                    <td>' . $data['email'] . '</td>

                                    <td>' . $data['phone'] . '</td>

                                    <td>' . $data['date'] . '</td>

                                    <td>' . $data['address'] . '</td>

                                    <td>' . $data['comment'] . '</td>

                                </tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            </main>
        </div>
    </div>




















<?php
    include $templates . 'footer.php';
?>

<?php
    }
?>