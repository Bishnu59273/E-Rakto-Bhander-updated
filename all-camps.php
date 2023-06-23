<!-- Header Link -->
<?php require "header.php";?>


<!--  -->
<!--  -->

<!-- <h3 class="sta">BLOOD STOCK AVAILABILITY</h3> -->

<link rel="stylesheet" href="assets/css/InBC.css">



<div>


    <!-- <Center> -->
    <div class="Stock-A-form">
        <h4 class="hed">SEARCH CAMPS </h4>
        <center>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST" class="col-md-6">

                <select class="Search-filds col-md-6" name="CampDist" required>
                    <option disable selection>Select District</option>
                    <option value="Alipurduar">Alipurduar</option>
                    <option value="Bankura">Bankura</option>
                    <option value="Birbhum">Birbhum</option>
                    <option value="Cooch Behar">Cooch Behar</option>
                    <option value="Dakshin Dinajpur">Dakshin Dinajpur</option>
                    <option value="Darjeeling">Darjeeling</option>
                    <option value="Hooghly">Hooghly</option>
                    <option value="Howrah">Howrah</option>
                    <option value="Jalpaiguri">Jalpaiguri</option>
                    <option value="Jhargram">Jhargram</option>
                    <option value="Kalimpong">Kalimpong</option>
                    <option value="Kolkata">Kolkata</option>
                    <option value="Maldah">Maldah</option>
                    <option value="Murshidabad">Murshidabad </option>
                    <option value="Nadia">Nadia</option>
                    <option value="North Twenty Four Parganas">North Twenty Four Parganas</option>
                    <option value="Paschim Bardhaman">Paschim Bardhaman</option>
                    <option value="Paschim Medinipur">Paschim Medinipur</option>
                    <option value="Purba Bardhaman">Purba Bardhaman</option>
                    <option value="Purba Medinipur">Purba Medinipur</option>
                    <option value="Purulia">Purulia</option>
                    <option value="South Twenty Four Parganas">South Twenty Four Parganas</option>
                    <option value="Uttar Dinajpur">Uttar Dinajpur</option>
                </select>
                <button id="buton1" class="col-md-6" name="CampSerch" type="submit">search</button>
            </form>
        </center>
    </div>
    <!-- </Center> -->
</div>

<div class="allcamp-show-con">

    <?php

            // Check if form is submitted
            if (isset($_POST['CampSerch'])) {
                // Get the selected district from the form
                $CampDist = $_POST['CampDist'];

                // Perform database query based on the selected district
                // $servername = 'your_host';
                // $username = 'your_username';
                // $password = 'your_password';
                // $dbname = 'your_database';

                // Create a MySQLi connection
                // $conn = new mysqli($servername, $username, $password, $dbname);

                require "db/dbconn.php";

                // Check if connection is successful
                // if ($conn->connect_error) {
                //     die('Connection failed: ' . $conn->connect_error);
                // }


                if(isset($_POST['active_button'])){
                    $camp_id = $_POST['camp_id'];
    
                    // Update the 'active' field to zero in the database for the selected camp
                    $update_query = "UPDATE campregister SET CmpApprove = '1' WHERE CampRegno = '$camp_id'";
                    mysqli_query($conn, $update_query);
                }

                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Get the current date
                    $currentDate = date('Y-m-d');

                    // Construct the SQL query
                    $sql = "SELECT * FROM campregister WHERE CampDist = '$CampDist' AND CampEDate >= '$currentDate'";

                    // Execute the query
                    $result = $conn->query($sql);
                    $i=0;
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

                            $camp_id = $row['Id'];
                            $i++;
                            echo '<tr>';
                            echo '<td>' . $i . '</td>';
                            echo '<td>' . $row['CampRegno'] . '</td>';
                            echo '<td>' . $row['CampName'] . '</td>';
                            echo '<td>Mobile No:-'.$row['COrgMnum']. "<br>Email :-" .$row['COrgEmail'] . '</td>';
                            echo '<td>' . $row['CampAdd']. " <br>City :-" .$row['CampCity']." <br> Dist :-" .$row['CampDist'] . '</td>';
                            echo '<td>' . $row['COrgname'] ." <br> Bank :-" .$row['CBBName'] . '</td>';
                            echo '<td>' . $row['COrgnizername'] . '</td>';
                            echo '<td>' . $row['CampSDate'] ." To " .$row['CampEDate'] . '</td>';
                            echo '<td>Start :-' .$row['CStTime']. "<br> End :-" .$row['CEndTime'] . '</td>';
                            echo '<td><form method="post" action="">
                                    <input type="hidden" name="camp_id" value="<?php echo $camp_id; ?>">
    <input type="submit" name="active_button" value="Active" class="active-button">

    </form>
    </td>';




    // <button class="" name="" style="weidth: 1%;">not approve</button>
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
        echo "<script>
        alert('No Active Camps for the selected district.')
        </script>";
        echo '</table>';

    }

    // Close the database connection
    // $conn->close();
    mysqli_close($conn);
    }
    }
    ?>


</div>




<!-- Footer Link -->
<?php require "footer.php";?>