<header>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="./images/logo.png" alt="logo-image" class="d-inline-block align-top logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="mx-auto d-flex justify-content-center flex-grow-1">
                    <ul class="navbar-nav d-flex flex-row">
                        <li class="nav-item">
                            <a class="nav-link" href="./index.php">HOME</a>
                        </li>
                        <!-- To be removed -->
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard_admin.php">AdminDash</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard_doctor.php">DocDash</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./dashboard_patient.php">PatDash</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">SERVICES</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">CONTACT</a>
                        </li>
                    </ul>
                </div>
                <?php
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
                    //Change login and register buttons to logout
                    echo "
                    <div class='userLogOut navbar-text'>
                        $_SESSION[username] - <a href='./logout.php' class='btn btn-outline-secondary btn-sm'>Log Out</a>
                    </div>";
                } else {
                    //Keep login and register buttons on the page
                    echo "
                    <div class='loginRegister'>
                        <a href='./login.php' class='btn btn-outline-primary btn-sm '>LOGIN</a>
                        <a href='./register.php' class='btn btn-outline-primary btn-sm'>REGISTER</a>
                    </div>";
                }
                ?>
            </div>
        </div>
    </nav>
</header>
