<?php
//Include database connection script
include 'connection.php';

var_dump($_POST);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Collect POST data
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    //Validate and sanitize user input
    $username = htmlspecialchars($username);
    $password = password_hash($password, PASSWORD_BCRYPT);
    $role = htmlspecialchars($role);

    $stmt = $conn->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user, $password, $role);

    if($stmt->execute()) {
        echo "New user registration successful!";
    } else {
        echo "Error: ".$stmt->error;
    }

    //Close connection
    $stmt->close();
    $conn->close();
} else {
    echo "Method not allowed";
}
?>