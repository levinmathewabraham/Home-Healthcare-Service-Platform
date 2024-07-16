<?php
session_start();
if($_SESSION['role'] != 'doctor') {
    header("Location: login.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Doctors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, Doctor!</h1>
        <div class="row">
            <div>
                <a href="./appointments.php">View Appointments</a>
            </div>
            <div>
                <a href="./medical records.php">Access Medical Records</a>
            </div>
            <div>
                <a href="./update_profile.php">Update Profile</a>
            </div>
            <div>
                <a href="./ratings.php">View Ratings</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>
</html>
