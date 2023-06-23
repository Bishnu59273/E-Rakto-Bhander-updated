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
  

    <title>Admin</title>

      <!-- bootstrap css -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
    <!-- pre loader start -->
    <div class="preloader-wrap">
        <div class="loader">
            <div class="drop"></div>
            <div class="wave"></div>
        </div>
    </div>
    <!-- pre loader end -->
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
                    <i class="bx bx-search icon"></i>
                    <input type="text" placeholder="Search..." />
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="text nav-text">Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bar-chart-alt-2 icon"></i>
                            <span class="text nav-text">Revenue</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-bell icon"></i>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-pie-chart-alt icon"></i>
                            <span class="text nav-text">Analytics</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-heart icon"></i>
                            <span class="text nav-text">Likes</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class="bx bx-wallet icon"></i>
                            <span class="text nav-text">Wallets</span>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
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
            <div class="col-md-12 eb-m-c-d">
                <div class="col-sm-6 eb-1st-t">
                    <!-- <table class="b-table" width="50%">

                        <tbody>
                            <th colspan="5">Blood Request</th>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                        </tbody>
                    </table> -->
                
                <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                
                </div>

                <div class="col-sm-6 eb-2nd-t">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>

                </div>

            </div>


            <div class="col-md-12 eb-m-c-d">
                <div class="col-sm-6 eb-1st-t">
                    <!-- <table class="b-table" width="50%">

                        <tbody>
                            <th colspan="5">Blood Request</th>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                        </tbody>
                    </table> -->
                
                <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                
                </div>

                <div class="col-sm-6 eb-2nd-t">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>

                </div>

            </div>


            <div class="col-md-12 eb-m-c-d">
                <div class="col-sm-6 eb-1st-t">
                    <!-- <table class="b-table" width="50%">

                        <tbody>
                            <th colspan="5">Blood Request</th>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                            <tr>
                                <td>Group</td>
                                <td>Unit</td>
                                <td class="eb-adrs">address</td>
                                <td class="eb-ph">Phone no.</td>
                                <td>Response</td>
                            </tr>
                        </tbody>
                    </table> -->
                
                <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                
                </div>

                <div class="col-sm-6 eb-2nd-t">
                    <ul class="list-group list-group-horizontal">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-sm">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                     <ul class="list-group list-group-horizontal-md">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-lg">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>
                    <ul class="list-group list-group-horizontal-xl">
                        <li class="list-group-item">An item</li>
                        <li class="list-group-item">A second item</li>
                        <li class="list-group-item">A third item</li>
                        <li class="list-group-item">A third item</li>
                    </ul>

                </div>

            </div>
        </div>
    </section>

    <script src="assets/js/script.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/plugins/jquary/jquary.min.js"></script>
</body>

</html>