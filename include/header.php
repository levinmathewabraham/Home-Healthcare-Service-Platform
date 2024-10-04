<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div class="container-fluid px-0">
            <div class="info-tab px-2">
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                        <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414zM0 4.697v7.104l5.803-3.558zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586zm3.436-.586L16 11.801V4.697z"/>
                    </svg>&nbsp;help@hhs.org &nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71z"/>
                    </svg>24/7
                </p>
                <p>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
                    </svg>&nbsp;+91 0987654321, +91 1234567890
                </p>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">
                Home Healthcare <br>Service
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto d-flex justify-content-center flex-grow-1">
                    <!-- For screen size greater than medium(md) -->
                    <ul class="navbar-nav mx-auto d-none d-md-flex">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard_redirect.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./doctor_profiles.php">DOCTORS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                    <!-- For screen size lesser than medium(md) -->
                    <ul class="navbar-nav me-auto d-md-none">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard_redirect.php">DASHBOARD</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./doctor_profiles.php">DOCTORS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./about.php">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
                <?php
                if (isset($_SESSION['loggedIn']) == true) {
                    //Change login and register buttons to logout
                    echo "
                    <div class='userLogOut navbar-text'>
                        <span class = 'loggedInUser'>$_SESSION[username]</span> - <a href='./logout.php' class='logoutButton btn btn-sm'>Log Out</a>
                    </div>";
                } else {
                    //Keep login and register buttons on the page
                    echo "
                    <div class='loginRegister'>
                        <a href='./login.php' class='btn btn-sm'>LOGIN</a>
                        <a href='./register.php' class='btn btn-sm'>REGISTER</a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </nav>
</header>
