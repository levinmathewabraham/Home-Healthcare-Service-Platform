<?php
session_start();
include 'connection.php';

//Check if user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

//Redirect user based on role
$role = $_SESSION['role'];
switch ($role) {
    case 'admin':
        //Admin stays on this page
        break;
    case 'doctor':
        header('Location: dashboard_doctor.php');
        exit();
    case 'patient':
        header('Location: dashboard_patient.php');
        exit();
    default:
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

    <div class="wrapper">
        <main>
            <?php
            if(isset($_SESSION['loggedIn'])) {
                echo "<h1 class = 'admin-greeting'>WELCOME, " . $_SESSION['fullname'] . "</h1> ";
            }
            ?>

            <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2 active" aria-current="page" href="#">
                                    Manage Users
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    Manage Appointments
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    Manage Medical Records
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="dash-items nav-link d-flex align-items-center gap-2" href="#">
                                    View Analytics
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </main>
    </div>
    
    <?php require_once './include/footer.php'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>
