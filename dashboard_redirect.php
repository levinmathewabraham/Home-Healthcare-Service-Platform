<?php
session_start();

//Check if user is logged in
if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
    header('Location: login.php');
    exit();
}

//Redirect user based on role
switch ($_SESSION['role']) {
    case 'patient':
        header('Location: dashboard_patient.php');
        break;
    case 'doctor':
        header('Location: dashboard_doctor.php');
        break;
    case 'admin':
        header('Location: dashboard_admin.php');
        break;
    default:
        header('Location: login.php');
        break;
}
exit();
?>