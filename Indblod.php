<!-- Header Link -->
<?php require "header.php";?>


<!--  -->

<link rel="stylesheet" href="css/InBC.css">


<!--  -->

<h3 class="sta">BLOOD STOCK AVAILABILITY</h3>



<!-- <Center> -->
<div class="Stock-A-form">
    <h4 class="hed">SEARCH BLOOD STOCK </h4>
    <center>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post" class="col-md-6">

            <select class="Search-filds col-md-6" name="OrgBBDist">
                <option disabled selected>Select District</option>
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



            <button id="buton1" class="col-md-6" name="OrgBBSerch" type="Submit">search</button>
        </form>
    </center>
</div>
<!-- </Center> -->




<div class="allcamp-show-con">
    <?php

            // Check if form is submitted
            if (isset($_POST['OrgBBSerch'])) {
                // Get the selected district from the form
                $OrgBBDist = $_POST['OrgBBDist'];
                require "db/dbconn.php";
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    // Construct the SQL query
                    $sql = "SELECT * FROM orgbloodbankregistration WHERE OrgBBDist = '$OrgBBDist'";

                    // Execute the query
                    $result = $conn->query($sql);
                    $i=0;
                    // Check if any rows are returned
                    if ($result->num_rows > 0) {
                        // Output the data in an HTML table
                        echo '<table border="1">';
                        echo '<tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Address</th>
                                <th>Category</th>
                                <th>Availabity</th>
                                <th>Last Update</th>
                            </tr>';
                        while ($row = $result->fetch_assoc()) {
                            $i++;
                            echo '<tr>';
                            echo '<td>' . $i . '</td>';
                            echo '<td>' . $row['OrgBBname'] . '</td>';
                            echo '<td>Mobile No:- <br>' . $row['OrgMNum']. " <br>Email ID:-" .$row['ORgBBEmail']. '</td>';
                            echo '<td>' . $row['OrgBBFullAdd']. " <br>City :-" .$row['OrgBBCity']." <br> Dist :-" .$row['OrgBBDist'] . '</td>';
                            echo '<td>' . $row['OrgBBType'] . '</td>';
                            echo '<td>' . $row['AvailableStock']. '</td>';
                            echo '<td>' .$row['OrgBBLastLogin']. '</td>';
                            echo '</tr>';
                        }
                        echo '</table>';
                    } else {

                        echo '<table border="1">';
                        echo '<tr>
                                <th>SL No</th>
                                <th>Name</th>
                                <th>Details</th>
                                <th>Category</th>
                                <th>Availabity</th>
                                <th>Last Update</th>
                            </tr>';
                        echo "<script>alert('No Active Blood Banks for the selected district.')</script>";
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