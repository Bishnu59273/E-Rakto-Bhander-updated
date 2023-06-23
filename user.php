<?php
session_start();
// Check if session is set
if ($_SESSION['dlogged_in'] !== true) {
    mysqli_close($conn);
    header('Location: index.php');
    exit;
}


?>


<!-- Coding by CodingLab | www.codinglabweb.com -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="icon" type="image/x-icon" href="assets/images/favicon_transp.png" />

    <!----===== Boxicons CSS ===== -->
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />

    <link href="assets/icons/uicons-regular-rounded/uicons-regular-rounded.css" rel="stylesheet" />


    <title>E-RB Admin</title>

    <!-- bootstrap css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="assets/images/logo.png" alt="" />
                </span>

                <div class="text logo-text">
                    <span class="name">E-Rakta Bhandar</span>
                    <span class="profession">Your Dashboard</span>
                </div>
            </div>

            <i class="bx bx-chevron-right toggle"></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <li class="search-box">
                    <!-- <i class="bx bx-search icon"></i> -->
                    <!-- <input type="text" placeholder="Search..." /> -->

                    <a href="FreamePages/user-profile.php" target="p_window">
                        <i class="bx bx-home-alt icon"></i>
                        <span class="text nav-text">Dashboard</span>
                    </a>

                </li>

                <li class="search-box">

                    <a href="#">
                        <i class="bx bx-bar-chart-alt-2 icon"></i>
                        <span class="text nav-text"></span>
                    </a>
                </li>

                <li class="search-box">
                    <a href="FreamePages/Notification.php" target="p_window">
                        <i class="bx bx-bell icon"></i>
                        <span class="text nav-text"></span>
                    </a>

                </li>

                <li class="search-box">
                    <a href="FreamePages/donersettings.php">
                        <i class="fi fi-rr-settings-sliders"></i>
                        <span class="text nav-text">Setting</span>
                    </a>
                </li>

                <li class="search-box">


                </li>

            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="FreamePages/logout.php">
                        <i class="bx bx-log-out icon"></i>
                        <span class="text nav-text">Logout</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class="bx bx-moon icon moon"></i>
                        <i class="bx bx-sun icon sun"></i>
                    </div>
                    <span class="mode-text text">Dark mode</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>
            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">
            <div class="clock_box">
                <i class="bx bxs-stopwatch"></i>
                <div id="MyClockDisplay" class="clock" onload="showTime()"></div>
            </div>

            <div>
                <iframe src="FreamePages/user-profile.php" width=100% height=1000 name="p_window"></iframe>
            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/plugins/jquary/jquary.min.js"></script>
</body>

</html>