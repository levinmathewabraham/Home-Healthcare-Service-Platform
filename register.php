<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Home Healthcare Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>
    <header>
        <h1>Home Healthcare Service</h1>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-5 col-12">
                        <a class="navbar-brand" href="#"><img src="./images/logo.png" alt=""></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                    <div class="col-lg-7 col-12">
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./index.html">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Doctors</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Services</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./login.php">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./register.php">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <main class="form-signin w-100 m-auto">
        <form id="registerForm" action="./register.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Register</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingFullName" name="fullname" placeholder="Full Name" required>
                <label for="floatingFullName">Full Name</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingUsernameRegister" name="username" placeholder="Username" required>
                <label for="floatingUsernameRegister">Username</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" id="floatingEmail" name="email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPasswordRegister" name="password" placeholder="Password" required>
                <label for="floatingPasswordRegister">Password</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="showPasswordRegister">
                <label class="form-check-label" for="showPasswordRegister">Show Password</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-control" id="floatingRole" name="role" required>
                    <option value="patient">Patient</option>
                    <option value="doctor">Doctor</option>
                    <option value="admin">Admin</option>
                </select>
                <label for="floatingRole">Role</label>
            </div>
            
            <button class="btn btn-primary w-100 py-2 my-3" type="submit">Sign Up</button>
            <a href="./login.html"><p>Already have an account? Sign in</p></a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; 2024</p>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="./js/index.js"></script>
</body>
</html>

<?php
//Include database connection script
include 'connection.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Collect POST data
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $role = $_POST['role'];

    $errors = [];

    //Server-side validation
    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }
    
    if (empty($username)) {
        $errors[] = "Username is required.";
    }
    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    
    if (strlen($password) < 6) {
        $errors[] = "Password must be atleast 6 characters long.";
    }

    if (empty($role)) {
        $errors[] = "Role is required.";
    }

    //Check if there are any validation errors
    if(empty($errors)) {
        //Password hashing
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        //Prepare and bind
        $stmt = $conn->prepare("INSERT INTO users (fullname, username, email, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullname, $username, $email, $hashed_password, $role);

        //Statement execution
        if($stmt->execute()) {
            echo "<script>alert('Registration Successful.'); window.location.href = 'connection.php';</script>";
        } else {
            echo "<script>alert('Error: ".$stmt->error."');</script>";
        }

        //Close connection
        $stmt->close();
    } else {
        //Display errors
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    }
    $conn->close();
}
?>