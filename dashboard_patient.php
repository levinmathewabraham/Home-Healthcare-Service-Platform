<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Patients</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <div class="container">
        <h1>Welcome, Patient!</h1>
        <div class="row">
            <div>
                <a href="./appointments.php">View Appointments</a>
            </div>
            <div>
                <a href="./appointments.php">Book Appointment</a>
            </div>
            <div>
                <a href="./medical_records.php">Update Medical Records</a>
            </div>
            <div>
                <a href="./doctors.php">View Doctors</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="./js/index.js"></script>
</body>
</html>

<?php
if($_SESSION['role'] != 'patient') {
    header("Location: login.php");
    exit();
}
?>
