<?php

// Connect to the database
// $conn = mysqli_connect("localhost", "root", "", "eraktobhander");

require "db/dbconn.php";


// Perform the database operation based on the selected operation
if (isset($_POST['Crequest'])) {

    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $COrgType = $_POST['COrgType'];
        $COrgname = $_POST['COrgname'];
        $COrgnizername = $_POST['COrgnizername'];
        $COrgMnum = $_POST['COrgMnum'];
        $COrgEmail = $_POST['COrgEmail'];
        $CampName = $_POST['CampName'];
        $CampAdd = $_POST['CampAdd'];
        $CampDist = $_POST['CampDist'];
        $CampCity = $_POST['CampCity'];
        $CBBName = $_POST['CBBName'];
        $COrgBBUserName = $_POST['COrgBBUserName'];
        $CampSDate = $_POST['CampSDate'];
        $CampEDate = $_POST['CampEDate'];
        $CStTime = $_POST['CStTime'];
        $CEndTime = $_POST['CEndTime'];
        $CParticopant = $_POST['CParticopant'];
        $CSapporter = $_POST['CSapporter'];
        // $ = $_POST[''];




        // Check if user ID already exists
        $obquery = "SELECT * FROM orgbloodbankregistration WHERE OrgBBUserName = '$COrgBBUserName'";
        $result = mysqli_query($conn, $obquery);
        if (mysqli_num_rows($result) > 0) {
            // echo "<script>alert('User Name Already exists')</script>";
            // Perform necessary actions if user ID exists
            // ...


            $currentDate = date('dmY');
            $current = date('d-m-Y');
            // $TokenID = (uniqid());
            $tokenno = (rand(1, 10000000000));

            $TokenID = $currentDate . '' . $tokenno;
            // Create a message
            $message = "Your Request Submited. Camp Reagistration :- $TokenID";
            // Insert operation
            $query = "INSERT INTO CampRegister (CampRegno, COrgType, COrgname, COrgnizername, COrgMnum, COrgEmail, CampName, CampAdd, CampDist, CampCity, CBBName, COrgBBUserName, CampSDate, CampEDate, CStTime, CEndTime, CParticopant, CSapporter, CampRegDate) VALUES ('$TokenID', '$COrgType', '$COrgname', '$COrgnizername', '$COrgMnum', '$COrgEmail', '$CampName', '$CampAdd', '$CampDist', '$CampCity', '$CBBName', '$COrgBBUserName', '$CampSDate', '$CampEDate', '$CStTime', '$CEndTime', '$CParticopant', '$CSapporter', '$current')";
            if (mysqli_query($conn, $query)) {
                // echo "Record inserted successfully. your token no is :-" . $currentDate . "" . $TokenID;
                // Print the message in an alert
                echo "<script>alert('$message');</script>";
                mysqli_close($conn);
                header("Refresh:0");
                exit;

            } else {
                // $message = "Error inserting record: " . mysqli_error($conn)."<a href='index.php'>Back to Form</a>";
                // echo "<script>alert('$message');</script>";
                echo "<script>alert('Reruest Not Sent')</script>";
                mysqli_close($conn);
                header("Refresh:0");
                exit;
            }
            // // Close the database connection
            // mysqli_close($conn);
            // header("Refresh:0");

            // exit;
        } else {
            echo "<script>alert('Wrong User NAme')</script>";

        }


        // Close the database connection

        // header("Refresh:0");
        // exit;
    }
}
?>
<?php require "header.php"; ?>
<div class="form_box">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="form_title">
                    <h1>Camp Registration</h1>
                </div>
            </div>
            <div class="col-md-12">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="p-3">
                    <div class="row justify-content-center">
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <select class="form-control" name="COrgType" required>
                                <option disable selected>Orgnization/Blood Bank Type</option>
                                <option value="Govt.">Govt.</option>
                                <option value="Private">Private</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="COrgname" placeholder="Orgnization Name"
                                required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="COrgnizername" placeholder="Orgnizer Name"
                                required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="COrgMnum" placeholder="Orgnizer Mobile"
                                required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="COrgEmail" placeholder="Orgnizer Email"
                                required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CampName" placeholder="Camp Name" required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CampAdd" placeholder="Camp Addres" required>
                        </div>
                        <div class="form-group col-md-4 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CampCity" placeholder="City Name" required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <select class="form-control" name="CampDist" required>
                                <option disable selected>Select District</option>
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
                        </div>

                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CBBName" placeholder="Enter Blood Bank ID"
                                required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <label>Camp Propose Date</label>
                            <input type="date" class="form-control" name="CampSDate" placeholder="Camp Propose Date"
                                required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <label>Camp End Date :</label>
                            <input type="date" class="form-control" name="CampEDate" placeholder="Camp End Date"
                                required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <label>Start Time:</label>
                            <input type="time" class="form-control" id="start_time" name="CStTime"
                                placeholder="Start Time(12HH:MM)" required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <label class="text1">End Time:</label>
                            <input type="time" class="form-control" name="CEndTime" placeholder="End Time:(12HH:MM)"
                                required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CParticopant"
                                placeholder="Estimated Participants" required>
                        </div>
                        <div class="form-group col-md-6 mb-2 mb-md-3">
                            <input type="text" class="form-control" name="CSapporter"
                                placeholder="Refence/Camp Supporter(Prayojak)" required>
                        </div>
                        <br>
                        <div class="col-md-3 text-center"><button type="submit" class="btn btn-danger"
                                name="Crequest">Submit</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require "footer.php"; ?>