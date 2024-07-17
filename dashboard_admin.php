<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Administrators</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, Admin!</h1>
        <div class="row">
            <div>
                <a href="./manage_users.php">Manage Users</a>
            </div>
            <div>
                <a href="./manage_appointments.php">Manage Appointments</a>
            </div>
            <div>
                <a href="./manage_doctors.php">Manage Doctors</a>
            </div>
            <div>
                <a href="./view_analytics.php">View Analytics</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>
</html>

<?php
if($_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>
