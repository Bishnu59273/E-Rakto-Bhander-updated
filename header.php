<?php
session_start();
// Define database connection variables
// define('DB_HOST', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'e-rakhtabhandar');

// // Connect to database
// $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

// // Check connection
// if ($mysqli->connect_error) {
//   die('Error connecting to database: ' . $mysqli->connect_error);
// }
require 'db/dbconn.php';

// Function to sanitize user input
function sanitizeInput($input)
{
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

if (isset($_POST['DonorLogIn'])) {
    // User is not logged in, process login form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get username and password from POST request
        $DEmail = sanitizeInput($_POST['EmailID']);
        $password = sanitizeInput($_POST['password']);


        // Check if user exists in database
        $sql = "SELECT * FROM donoruser WHERE DEmail = '$DEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();

            $storedPassword = $row['DNPass'];

            if (password_verify($password, $storedPassword)) {
                // echo 'Login successful.';
                // User exists, login user
                $_SESSION['dlogged_in'] = true;
                $_SESSION['DEmail'] = $DEmail;
                $_SESSION['DUserName'] = $row['DUserName'];
                // $_SESSION['email'] = $row['email'];
                // $_SESSION['name'] = $row['name'];

                // Redirect to home page
                header('Location: user.php');
            } else {
                echo '<script>alert("Invalid PAssword")</script>';

                mysqli_close($conn);
                header("Refresh:0");
                exit;
            }

        } else {
            // User does not exist, show error message
            echo '<script>alert("Invalid Donor Login Cerdetional")</script>';

            mysqli_close($conn);
            header("Refresh:0");
            exit;
        }
    }
}

if (isset($_POST['Organization'])) {
    // User is not logged in, process login form
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Get username and password from POST request
        $ORgBBEmail = sanitizeInput($_POST['EmailID']);
        $password = sanitizeInput($_POST['password']);


        // Check if user exists in database
        $sql = "SELECT * FROM orgbloodbankregistration WHERE ORgBBEmail = '$ORgBBEmail'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {

            $row = $result->fetch_assoc();

            $storedPassword = $row['OrgBBPassword'];

            if (password_verify($password, $storedPassword)) {
                // echo 'Login successful.';
                // User exists, login user
                $_SESSION['ologged_in'] = true;
                $_SESSION['ORgBBEmail'] = $ORgBBEmail;
                // $_SESSION['user_id'] = $row['user_id'];
                // $_SESSION['email'] = $row['email'];
                // $_SESSION['name'] = $row['name'];

                // Redirect to home page
                header('Location: Org-BB.php');
            } else {
                echo '<script>alert("Invalid PAssword")</script>';
                mysqli_close($conn);
                header("Refresh:0");
                exit;
            }

        } else {
            // User does not exist, show error message
            echo '<script>alert("Invalid OrgBB Login Cerdetional")</script>';
            mysqli_close($conn);
            header("Refresh:0");
            exit;
        }
    }
}

?>





<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <title>E-Rakta Bhandar</title>

    <link rel="icon" type="image/x-icon" href="assets/images/favicon_transp.png" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/icons/uicons-regular-rounded/uicons-regular-rounded.css" rel="stylesheet" />
    <link href="assets/icons/uicons-brands/uicons-brands.css" rel="stylesheet" />
    <link href="assets/icons/uicons-solid-straight/uicons-solid-straight.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href="assets/plugins/swiper/css/swiper-bundle.min.css" rel="stylesheet" />

    <link href="assets/css/main.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/btn.css">

    <!--  -->


    <style>
    .mb-parent-c {
        display: flex !important;
        justify-content: space-evenly;
        margin: 3%;
        width: auto !important;
    }

    .mb-child-c {

        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1rem;
        box-shadow: 2px 8px 8px rgba(247, 2, 2, 0.5);
        border: 1px solid rgba(247, 2, 2, 0.573);
        padding: 1%;
        text-align: center;

    }

    .grid-mn {
        color: #fff;
        background-color: #bf222b;
        position: relative;
        border-radius: 7px;
        padding: 3%;
        margin: 1rem;
        line-height: 1;
        font-weight: 600;
        border: none;
    }

    .grid-mn:hover {
        transform: translateY(-3px);
        box-shadow: 2px 8px 8px rgba(66, 62, 62, 0.427);
    }


    .featured-image {
        width: 100%;
    }
    </style>
</head>

<body>
    <!--  -->
    <div id="button"></div>
    <div class="preloader-wrap">
        <div class="loader">
            <div class="drop"></div>
            <div class="wave"></div>
        </div>
    </div>
    <!-- Header Link -->
    <header>
        <div class="container">
            <div class="row">

                <div class="top_header">
                    <div class="clock_box">
                        <ul class="social">
                            <li>
                                <a href="#" target="#"><i class="fa fa-envelope"></i></a>
                            </li>
                            <li>
                                <a href="#" target="#"><i class="fab fa-facebook-f"></i></a>
                            </li>
                            <li>
                                <a href="#" target="#"><i class="fab fa-instagram"></i></a>
                            </li>
                            <li>
                                <a href="#" target="#"><i class="fab fa-youtube"></i></a>
                            </li>
                            <br />
                        </ul>

                        <i class="fi fi-rr-clock-three"></i>
                        <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
                    </div>
                </div>
            </div>
            <div class="top_logo_box">
                <ul>
                    <li>
                        <a href="index.php">
                            <img src="assets/images/logo.png" alt="logo" class="img-fluid" />
                        </a>
                    </li>
                    <!--<li>-->
                    <!--    <a href="#" target="_blank">-->
                    <!--        <img src="assets/images/ashak_stambh.png" alt="ashak-logo" class="img-fluid" />-->
                    <!--    </a>-->
                    <!--</li>-->
                    <!--<li>-->
                    <!--    <a href="#" target="_blank">-->
                    <!--        <img src="assets/images/amrit_logo.png" alt="amrit-logo" class="img-fluid" />-->
                    <!--    </a>-->
                    <!--</li>-->
                </ul>
                <div class="header_button"><a href="#" data-bs-toggle="modal" data-bs-target="#LoginModal"><i
                            class="fi fi-rr-sign-in-alt"></i>Login</a>
                    <a href="doner-registration.php"><i class="fi fi-rr-user"></i>Sign Up</a>
                </div>
            </div>
        </div>
    </header>
    <section class="navigation">
        <div class="container">
            <div class="row">

                <nav class="navbar navbar-expand-lg" id="main_navbar">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#default_nav" aria-controls="default_nav" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="default_nav">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="index.php">
                                        <i class="fi fi-rr-house-chimney"></i> Home
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="fi fi-rr-plus"></i>
                                        Need Blood
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="Indblod.php">Blood Bank Directory</a></li>
                                        <li><a class="dropdown-item" href="all-camps.php">Blood Donation Camps</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="faq.php">FaQ'S</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="camp.php"><i class="fi fi-rr-enter"></i> Camp
                                        Registration</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="contact-us.php"><i class="fi fi-rr-headset"></i>
                                        Conatct</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="about.php"><i class="fi fi-rr-info"></i> About</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </section>
    <!-- Login Modal -->
    <div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="LoginModalLabel">Login</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($_SESSION['dlogged_in'])) { ?>
                    You are already loged in go to <a href="user.php">dashboard </a>
                    <?php } elseif (isset($_SESSION['ologged_in'])) { ?>
                    You are already loged in go to
                    <a href="Org-BB.php">
                        dashboard
                    </a>
                    <?php } else { ?>
                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="EmailID" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" />
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" />
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1" />
                            <label class="form-check-label" for="exampleCheck1">Remember me</label>

                            <center>
                                <button name="DonorLogIn" type="submit"
                                    class="btn btn-primary col-sm-5">DonorLogIn</button>
                                <button name="Organization" type="submit"
                                    class="btn btn-success col-sm-5">Organization</button>

                            </center>
                        </div>
                    </form>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <a href="doner-registration.php" class="btn btn-secondary">create new account</a>
                    <!-- <button name="login" type="submit" class="btn btn-success">Login</button> -->
                </div>
            </div>
        </div>
    </div>