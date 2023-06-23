<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<title>Document</title>-->
    <!-- <link href="assets/css/admindash.css" rel="stylesheet" /> -->

    <link rel="stylesheet" href="assets/css/style.css" />
    <link href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />


    <style>
    /* body {
            background-color: #e4e9f7;
        } */

    body::-webkit-scrollbar {
        scroll-behavior: smooth;
        display: none;
    }

    .ad-d-coont {
        display: flex;
    }


    table {
        border: 1% solid rgb(15, 15, 15);
        margin: 1%;
        width: 95%;
    }

    table tr td label {
        position: relative;
        background-color: #bf222b;
        /*text-align: center;*/
        padding: 5px;

    }

    table tr th {
        background-color: #bf222b;
        color: rgb(255, 255, 255);
        padding: 7px;
        /* margin: 5px; */
    }

    table td button {
        border-radius: 3px;
    }

    /* table {
        border: 1% rgb(15, 15, 15);
        border-radius: 1px;
    }

    table tr td label {
        position: relative;
        background-color: #bf222b;
        text-align: center;
        padding: 7px;
        font-size: 50%;
    }

    table tr th {
        background-color: #bf222b;
        color: rgb(255, 255, 255);
        padding: 7px; */
    /* margin: 5px; */
    /* } */

    /* table tr td {
        font-size: 25px;
        text-transform: uppercase;
        font-family: Arial, Helvetica, sans-serif;
    } */

    p {
        font-size: 170%;
        text-align: center;
        font-family: sans-serif;
        text-transform: uppercase;
        color: white;
        background-color: #bf222b;
    }

    .cont-1st tr th {
        text-transform: uppercase;
    }

    .cont-2nd tr th {
        text-transform: uppercase;
    }

    .cont-3rd tr th {
        text-transform: uppercase;
    }

    .t-dnr {
        padding-left: 14.9%;
    }

    .t-upst {
        padding-left: 3%;
    }

    .t-uc {
        padding-left: 8%;
    }

    .t-lcp {
        padding-left: 3%;
    }

    .cont-3rd {
        padding-top: 10px;
    }

    .cont-2nd {
        padding-top: 10px;
    }

    .t-d {
        padding-left: 3%;
    }

    /* pacent name text-box */
    .pecent-t {
        padding-left: 3%;
        padding-bottom: 10px;
    }

    .pecent-t table tr td {
        text-transform: uppercase;
        color: #bf222b;
        font-family: sans-serif;
        font-size: 20px;
    }

    /* delete botton */
    .del {
        background-color: #bf222f;
        color: white;
    }

    td {
        background-color: #eeafaf;
        border: 1px solid black !important;
        text-align: center;
        font-size: 85%;
        font-weight: 500;
        padding: auto;
        color: black;
    }



    button {
        color: rgb(255, 255, 255);
        background-color: #2dbf1ad2;
        padding: auto;
    }
    </style>



</head>

<body>
    <header>
        <P>Dashboard</P>
    </header>

    <main>

        <center>


            <div id="dataContainer">


                <h3>Today Thalasimiya Requeests</h3>

                <?php

                // Today Thalashamiya Blood Request
                
                require "dbconn.php";

                $currentDate = date('Y-m-d');


                $sql = "SELECT * FROM requestblood WHERE DComplet = '0' AND TSA = 'Yes' AND RDate = '$currentDate'";


                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo '<table border="1">';
                    echo '<tr border="1">
                        <th>Token No</th>
                        <th>Blood Gropu</th>
                        <th>Blood Unit</th>
                        <th>Peacent Name</th>
                        <th>Peacent Address</th>
                        <th>Peacent Number</th>
                        <th>Thalasamia</th>
                        <th>Nearest Blood Bank</th>
                        <th>Date And Time</th>
                        <th>Donation</th>
                      </tr>';

                    // echo "Result founded";
                    // while($row=mysqli_fetch_array($result))
                
                    while ($row = $result->fetch_assoc()) {


                        echo "<tr><td>" . $row['TokenID'] . "</td>";
                        echo "<td>" . $row['BLG'] . "</td>";
                        echo "<td>" . $row['unit'] . "</td>";
                        echo "<td>" . $row['pname'] . "</td>";
                        echo "<td>" . $row['paddress'] . "</td>";
                        echo "<td>" . $row['phnumber'] . "</td>";
                        echo "<td>" . $row['TSA'] . "</td>";
                        echo "<td>" . $row['NBB'] . "</td>";
                        echo "<td>" . $row['dtcurrent'] . "</td>";
                        echo '<td>';
                        echo '<form method="POST" action="">';
                        echo '<input type="hidden" name="TsaBRid" value="' . $row['Id'] . '">';
                        echo '<button type="submit" name="TsaDonated">Complete</button>';
                        echo '</form>';
                        echo '</td>';
                    }
                    echo "</table>";
                } else {
                    echo "No Request Found.";
                }



                if (isset($_POST['TsaDonated']) && isset($_POST['TsaBRid'])) {
                    $TsaBrId = $_POST['TsaBRid'];

                    // Update the 'active' field to zero in the database for the selected camp
                    $update_query = "UPDATE requestblood SET DComplet = '1' WHERE Id = '$TsaBrId' ";
                    mysqli_query($conn, $update_query);
                    if (mysqli_query($conn, $update_query)) {
                        // echo "Account Created successfully. your username is :-" . $DUserName;
                        echo '<script>alert("Donation Complete.")</script>';
                        // header("Refresh:0");
                
                        // sleep(2);
                        // header("location:index.php");
                    } else {
                        echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";
                    }


                }

                mysqli_close($conn);


                ?>


                <h3>Today Blood Requeests</h3>


                <?php

                // Today Blood Request
                
                require "dbconn.php";

                $sql = "SELECT * FROM requestblood WHERE DComplet = '0' AND TSA = 'NO' AND RDate = '$currentDate'";


                $result = $conn->query($sql);

                if ($result->num_rows > 0) {

                    echo '<table border="1">';
                    echo '<tr border="1">
                        <th>Token No</th>
                        <th>Blood Gropu</th>
                        <th>Blood Unit</th>
                        <th>Peacent Name</th>
                        <th>Peacent Address</th>
                        <th>Peacent Number</th>
                        <th>Thalasamia</th>
                        <th>Nearest Blood Bank</th>
                        <th>Date And Time</th>
                        <th>Donation</th>
                </tr>';

                    // echo "Result founded";
                    // while($row=mysqli_fetch_array($result))
                
                    while ($row = $result->fetch_assoc()) {


                        echo "<tr><td>" . $row['TokenID'] . "</td>";
                        echo "<td>" . $row['BLG'] . "</td>";
                        echo "<td>" . $row['unit'] . "</td>";
                        echo "<td>" . $row['pname'] . "</td>";
                        echo "<td>" . $row['paddress'] . "</td>";
                        echo "<td>" . $row['phnumber'] . "</td>";
                        echo "<td>" . $row['TSA'] . "</td>";
                        echo "<td>" . $row['NBB'] . "</td>";
                        echo "<td>" . $row['dtcurrent'] . "</td>";
                        echo '<td>';
                        echo '<form method="POST" action="">';
                        echo '<input type="hidden" name="BRid" value="' . $row['Id'] . '">';
                        echo '<button type="submit" name="Donated">Complete</button>';
                        echo '</form>';
                        echo '</td>';
                    }
                    echo "</table>";
                } else {
                    echo "No Request Found.";
                }



                if (isset($_POST['Donated']) && isset($_POST['BRid'])) {
                    $BrId = $_POST['BRid'];

                    // Update the 'active' field to zero in the database for the selected camp
                    $update_query = "UPDATE requestblood SET DComplet = '1' WHERE Id = '$BrId'";
                    mysqli_query($conn, $update_query);
                    if (mysqli_query($conn, $update_query)) {
                        // echo "Account Created successfully. your username is :-" . $DUserName;
                        echo '<script>alert("Donation Complete.")</script>';
                        // header("Refresh:0");
                
                        // sleep(2);
                        // header("location:index.php");
                    } else {
                        // echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";
                        echo '<script>alert("Request Not Complete.")</script>';
                    }


                }

                mysqli_close($conn);


                ?>


            </div>



            <div class="allcamp-show-con">


                <h3>New Active Camp</h3>

                <?php


                require "dbconn.php";


                // Get the current date
                $currentDate = date('Y-m-d');

                // Construct the SQL query
                $sql = "SELECT * FROM campregister WHERE CmpApprove = '1' AND CampEDate >= '$currentDate'";

                // Execute the query
                $result = $conn->query($sql);
                $i = 0;
                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Output the data in an HTML table
                    echo '<table border="1">';
                    echo '<tr border="1">
                            <th>SL No</th>
                            <th>Registration NO</th>
                            <th>Camp Name</th>
                            <th>Details</th>
                            <th>Address</th>
                            <th>Organized By</th>
                            <th>Organizer</th>
                            <th>Conducted By</th>
                            <th>Time</th>
                          </tr>
                        ';
                    while ($row = $result->fetch_assoc()) {

                        // $camp_id = $row['Id'];
                        $i++;
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row['CampRegno'] . '</td>';
                        echo '<td>' . $row['CampName'] . '</td>';
                        echo '<td>Mobile No:-' . $row['COrgMnum'] . "<br>Email :-" . $row['COrgEmail'] . '</td>';
                        echo '<td>' . $row['CampAdd'] . " <br>City :-" . $row['CampCity'] . " <br> Dist :-" . $row['CampDist'] . '</td>';
                        echo '<td>' . $row['COrgname'] . " <br> Bank :-" . $row['CBBName'] . '</td>';
                        echo '<td>' . $row['COrgnizername'] . '</td>';
                        echo '<td>' . $row['CampSDate'] . " To " . $row['CampEDate'] . '</td>';
                        echo '<td>Start :-' . $row['CStTime'] . "<br> End :-" . $row['CEndTime'] . '</td>';
                        echo '</td>';
                        // echo '<td>' . . '</td>';
                        // echo '<td>' . . '</td>';
                        // echo '<td>' . . '</td>';
                        echo '</tr>';
                    }



                    echo '</table>';
                } else {

                    echo '<table border="1">';
                    echo '<tr border="1">
                            <th>SL No</th>
                            <th>Registration NO</th>
                            <th>Camp Name</th>
                            <th>Details</th>
                            <th>Address</th>
                            <th>Organized By</th>
                            <th>Organizer</th>
                            <th>Conducted By</th>
                            <th>Time</th>
                          </tr>
                        ';
                    echo "No Active Camps";
                    echo '</table>';

                }
                // Close the database connection
                // $conn->close();
                mysqli_close($conn);


                ?>


            </div>


            <div class="allcamp-show-con">


                <h3>Expaired Active Camp</h3>

                <?php


                require "dbconn.php";


                // Get the current date
                $currentDate = date('Y-m-d');

                // Construct the SQL query
                $sql = "SELECT * FROM campregister WHERE CmpApprove = '1' AND CampEDate <= '$currentDate'";

                // Execute the query
                $result = $conn->query($sql);
                $i = 0;
                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    // Output the data in an HTML table
                    echo '<table border="1">';
                    echo '<tr border="1">
                            <th>SL No</th>
                            <th>Registration NO</th>
                            <th>Camp Name</th>
                            <th>Details</th>
                            <th>Address</th>
                            <th>Organized By</th>
                            <th>Organizer</th>
                            <th>Conducted By</th>
                            <th>Time</th>
                            </tr>
                          ';

                    while ($row = $result->fetch_assoc()) {

                        // $camp_id = $row['Id'];
                        $i++;
                        echo '<tr>';
                        echo '<td>' . $i . '</td>';
                        echo '<td>' . $row['CampRegno'] . '</td>';
                        echo '<td>' . $row['CampName'] . '</td>';
                        echo '<td>Mobile No:-' . $row['COrgMnum'] . "<br>Email :-" . $row['COrgEmail'] . '</td>';
                        echo '<td>' . $row['CampAdd'] . " <br>City :-" . $row['CampCity'] . " <br> Dist :-" . $row['CampDist'] . '</td>';
                        echo '<td>' . $row['COrgname'] . " <br> Bank :-" . $row['CBBName'] . '</td>';
                        echo '<td>' . $row['COrgnizername'] . '</td>';
                        echo '<td>' . $row['CampSDate'] . " To " . $row['CampEDate'] . '</td>';
                        echo '<td>Start :-' . $row['CStTime'] . "<br> End :-" . $row['CEndTime'] . '</td>';
                        echo '</td>';
                        // echo '<td>' . . '</td>';
                        // echo '<td>' . . '</td>';
                        // echo '<td>' . . '</td>';
                        echo '</tr>';
                    }



                    echo '</table>';
                } else {

                    echo '<table border="1">';
                    echo '<tr border="1">
                            <th>SL No</th>
                            <th>Registration NO</th>
                            <th>Camp Name</th>
                            <th>Details</th>
                            <th>Address</th>
                            <th>Organized By</th>
                            <th>Organizer</th>
                            <th>Conducted By</th>
                            <th>Time</th>
                          </tr>
                            ';

                    echo "No Camps Found";
                    echo '</table>';

                }



                // Close the database connection
                // $conn->close();
                mysqli_close($conn);


                ?>


            </div>

        </center>

        <script src="assets/js/script.js"></script>
        <!-- <script src="assets/js/main.js"></script>
        <script src="assets/plugins/jquary/jquary.min.js"></script> -->

</body>

</html>