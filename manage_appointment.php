<?php
session_start();
include 'connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];
    $doctor_id = $_SESSION['user_id'];

    if (isset($_POST['accept'])) {
        // Accept the appointment
        $stmt_accept = $conn->prepare("UPDATE appointments SET accepted_by_doctor_id = ?, is_accepted = 1 WHERE id = ?");
        $stmt_accept->bind_param('ii', $doctor_id, $appointment_id);

        if ($stmt_accept->execute()) {
            // Send notification to the patient (set notification_sent = 1 if needed)
            $_SESSION['flash_message'] = 'Appointment accepted successfully';
            $_SESSION['flash_type'] = 'success';
        } else {
            $_SESSION['flash_message'] = 'Error accepting appointment';
            $_SESSION['flash_type'] = 'danger';
        }
        $stmt_accept->close();
    } elseif (isset($_POST['ignore'])) {
        // Simply ignore, allowing another doctor to accept
        $_SESSION['flash_message'] = 'Appointment ignored';
        $_SESSION['flash_type'] = 'info';
    }

    // Redirect back to the doctor's dashboard
    header('Location: dashboard_doctor.php');
    exit();
}

$conn->close();
?>
