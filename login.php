<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Home Healthcare Service</title>
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
        <form action="./connection.php" method="POST">
            <h1 class="h3 mb-3 fw-normal">Login</h1>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="loginIdentifier" name="identifier" placeholder="Username or Email" required>
                <label for="loginIdentifier">Username or Email</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="loginPassword" name="password" placeholder="Password" required>
                <label for="loginPassword">Password</label>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" id="showPasswordLogin">
                <label class="form-check-label" for="showPasswordLogin">Show Password</label>
            </div>

            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
            <a href="./register.php"><p class="py-2">Don't have an account? Register</p></a>
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

//Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Collect form data
    $identifier = trim($_POST['identifier']);
    $password = $_POST['password'];

    //Check if identifier is username or email
    if (filter_var($identifier, FILTER_VALIDATE_EMAIL)) {
        $stmt = "SELECT id, username, password, role FROM users WHERE email = ?";
    } else {
        $stmt = "SELECT id, username, password, role FROM users WHERE username = ?";
    }

    //Prepare and bind
    $stmt = $conn->prepare($stmt);
    $stmt->bind_param("s", $identifier);

    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($id, $username, $hashed_password, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            session_start();
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;

            header("Location: connection.php");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "Invalid username or email!";
    }
    $stmt->close();
}
$conn->close();
?>