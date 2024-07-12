<?php
//Include database connection script
include 'connection.php';

session_start();

//Check if form data is set
if (isset($_POST['username']) && isset($_POST['password'])) {
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);

    //Check if fields are empty
    if (empty($user) || empty($pass)) {
        die("All fields are required.");
    }

    $stmt = $conn->prepare("SELECT password, role FROM users WHERE username = ?");
    $stmt->bind_param("s", $user);

    $stmt->execute();
    $stmt->store_result();

    //Check if user exists
    if($stmt->num_rows == 1) {
        $stmt->bind_result($hashed_password, $role);
        $stmt->fetch();

        //Verify password
        if(password_verify($pass,$hashed_password)) {
            session_start();
            $_SESSION['username'] = $user;
            $_SESSION['role'] = $role;
            echo "Login successful! Welcome, ".htmlspecialchars($user).".";
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user was found with this username.";
    }

    //Close connection
    $stmt->close();
} else {
    die("Form data not set.");
}

$conn->close();
?>