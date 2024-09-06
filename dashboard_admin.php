<?php
session_start();
include 'connection.php';

//Check if user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

//Fetch admin details or any necessary data
$admin_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AdminDash - Home Healthcare Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Include header section -->
    <?php require_once './include/header.php' ?>

    <div class="wrapper container-fluid">
        <div class="row">
            <?php
            if(isset($_SESSION['loggedIn'])) {
                echo "<h1 class = 'admin-greeting'>WELCOME, " . $_SESSION['fullname'] . "</h1> ";
            }
            ?>

            <nav id="sidebarMenu" class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class=" position-sticky offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    My Dashboard
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    User Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    Appointment Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    Medical Records Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    Doctor Management
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    Patient Management
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Main Dashboard Content -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Admin Dashboard</h1>
                </div>
                <div class="dashboard-content">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card text-bg-primary mb-3">
                                <div class="card-header">Total Users</div>
                                <div class="card-body">
                                    <h5 class="card-title">-user count-</h5>
                                    <p class="card-text">Registered users in the system.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-bg-success mb-3">
                                <div class="card-header">Appointments Today</div>
                                <div class="card-body">
                                    <h5 class="card-title">-appointment count-</h5>
                                    <p class="card-text">Appointments scheduled for today.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card text-bg-danger mb-3">
                                <div class="card-header">Pending Requests</div>
                                <div class="card-body">
                                    <h5 class="card-title">-requests count-</h5>
                                    <p class="card-text">Pending approval from admin.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    
    <?php require_once './include/footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>
