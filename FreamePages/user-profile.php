<?php
session_start();
// Check if session is set
if ($_SESSION['dlogged_in'] == true) {

    // Get session data
    $DEmail = $_SESSION['DEmail'];
    $DUserName = $_SESSION['DUserName'];


    // // Connect to MySQLi
    // $mysqli = new mysqli('localhost', 'root', '', 'e-rakhtabhandar');

    require 'dbconn.php';

    // Check if user exists in database
    $query = "SELECT * FROM donoruser WHERE DEmail = '$DEmail'";

    $result = $conn->query($query);

    // If user exists, display welcome message
    if ($result->num_rows > 0) {

        // Get user data from database
        $row = $result->fetch_assoc();
        $DUserName = $row['DUserName'];
        // $name = $row['name'];
        $DFullName = $row['DFullName'];
        $DDOB = $row['DDOB'];
        $DAge = $row['DAge'];
        $DMnum = $row['DMnum'];
        // $DEmail = $row['DEmail'];
        $DGender = $row['DGender'];
        $DBGroup = $row['DBGroup'];
        $DOccup = $row['DOccup'];
        $DFatherName = $row['DFatherName'];
        $DMotherName = $row['DMotherName'];
        $DIDtype = $row['DIDtype'];
        $DIdNo = $row['DIdNo'];
        $DAddType = $row['DAddType'];
        $DState = $row['DState'];
        $DDist = $row['DDist'];
        $DCity = $row['DCity'];
        $DResArea = $row['DResArea'];
        $DFullAdd = $row['DFullAdd'];
        $DPinCode = $row['DPinCode'];
        // $DUserName = $row['DUserName'];

        // echo "Welcome, $name!";

    } else {

        // User does not exist, redirect to login page
        mysqli_close($conn);
        // header('Location: /index.php');
        exit;
    }

} else {

    // Session is not set, redirect to login page
    mysqli_close($conn);
    header('Location: ../index.php');
    exit;

}

// Function to check if the input field is read-only or editable
function isFieldReadOnly($isEditable)
{
    return $isEditable ? '' : 'readonly';
}

// Function to check if the Save button should be visible or hidden
function isSaveButtonVisible($isEditable)
{
    return $isEditable ? '' : 'hidden';
}
?>



<!DOCTYPE html>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" />

    <link rel="stylesheet" href="user.css" />

    <style>
    html,
    body {
        min-height: 100%;
    }

    body,
    div,
    form,
    input,
    select,
    p {
        padding: 0;
        margin: 0;
        outline: none;
        font-family: Roboto, Arial, sans-serif;
        font-size: 14px;
        color: #666;
    }

    h1 {
        margin: 0;
        font-weight: 400;
    }

    h3 {
        margin: 12px 0;
        color: #8ebf42;
    }

    .main-block {
        display: flex;
        justify-content: center;
        align-items: center;
        background: #fff;
    }

    form {
        width: 100%;
        padding: 20px;
    }

    fieldset {
        border: none;
        border-top: 1px solid #8ebf42;
    }

    .account-details,
    .personal-details {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .account-details>div,
    .personal-details>div>div {
        display: flex;
        align-items: center;
        margin-bottom: 10px;
    }

    .account-details>div,
    .personal-details>div,
    input,
    label {
        width: 100%;
    }

    label {
        padding: 0 5px;
        text-align: right;
        vertical-align: middle;
    }

    input {
        padding: 5px;
        vertical-align: middle;
    }

    .checkbox {
        margin-bottom: 10px;
    }

    select,
    .children,
    .gender,
    .bdate-block {
        width: calc(100% + 26px);
        padding: 5px 0;
    }

    select {
        background: transparent;
    }

    .gender input {
        width: auto;
    }

    .gender label {
        padding: 0 5px 0 0;
    }

    .bdate-block {
        display: flex;
        justify-content: space-between;
    }

    .birthdate select.day {
        width: 35px;
    }

    .birthdate select.mounth {
        width: calc(100% - 94px);
    }

    .birthdate input {
        width: 38px;
        vertical-align: unset;
    }

    .checkbox input,
    .children input {
        width: auto;
        margin: -2px 10px 0 0;
    }

    .checkbox a {
        color: #8ebf42;
    }

    .checkbox a:hover {
        color: #82b534;
    }

    button {
        display: flex;
        justify-content: center;
        width: 14%;
        padding: 10px 0;
        margin: 10px auto;
        border-radius: 5px;
        border: 1px solid black;
        background: #8ebf42;
        font-size: 14px;
        font-weight: 600;
        color: #fff;
    }

    button:hover {
        background: #fff;
        color: #8ebf42;
    }

    @media (min-width: 568px) {

        .account-details>div,
        .personal-details>div {
            width: 50%;
        }

        label {
            width: 40%;
        }

        input {
            width: 60%;
        }

        select,
        .children,
        .gender,
        .bdate-block {
            width: calc(60% + 16px);
        }
    }

    .udif {
        border: none;
    }

    input,
    select {
        border: none;
    }
    </style>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="main-block">
        <form id="profileForm" method="post" action="">
            <fieldset>
                <legend>
                    <h3>Welcome
                        <?php echo $row['DFullName']; ?>
                    </h3>
                </legend>
                <div class="account-details">
                    <span class="profile-pic-div">
                        <img src="about1.png" id="photo" />


                        <!-- <label for="file" id="uploadBtn">Choose Photo</label> -->
                    </span>

                    <!-- <script src="user.js"></script> -->
                </div>
            </fieldset>

            <fieldset class="udif-n">
                <div>
                    <span>
                        <input type="file" id="Imgupfile" style="display: none;"
                            accept="image/png, image/gif, image/jpeg, image/jpg">
                        <input type="text" class="udif" value="<?php echo $row['DUserName']; ?>" disabled>
                    </span>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h3>Personal Details</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div>
                            <label>Name :- </label><input type="text" required name="DFullName"
                                Value="<?php echo $row['DFullName']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Date Of Birth :- </label><input type="date" required name="DDOB"
                                Value="<?php echo $row['DDOB']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Age :- </label><input type="number" required name="DAge"
                                Value="<?php echo $row['DAge']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Email :- </label><input type="text" required name="uDEmail"
                                Value="<?php echo $row['DEmail']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Mobile No :- </label><input type="text" required name="DMnum"
                                Value="<?php echo $row['DMnum']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Gender :- </label>
                            <select class="U-ifs" required name="DGender" <?php echo isFieldReadOnly(true); ?>>
                                <option disabled selected>
                                    <?php echo $row['DGender']; ?>
                                </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>


                        <div>
                            <label>Blood Group :- </label>
                            <select required name="DBGroup" <?php echo isFieldReadOnly(true); ?>>
                                <option disabled selected>
                                    <?php echo $row['DBGroup']; ?>
                                </option>
                                <option value="AB-Ve">AB-Ve</option>
                                <option value="AB+Ve">AB+Ve</option>
                                <option value="A-Ve">A-Ve</option>
                                <option value="A+Ve">A+Ve</option>
                                <option value="B-Ve">B-Ve</option>
                                <option value="B+Ve">B+Ve</option>
                                <option value="Oh-VE">Oh-VE</option>
                                <option value="Oh+VE">Oh+VE</option>
                                <option value="O-Ve">O-Ve</option>
                                <option value="O+Ve">O+Ve</option>
                            </select>

                        </div>



                        <div>
                            <label>Occupation :- </label><input type="text" required name="DOccup"
                                Value="<?php echo $row['DOccup']; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h3>Family Details :- </h3>
                </legend>
                <div class="account-details">
                    <div>
                        <label>Father name :- </label><input type="text" required name="DFatherName"
                            Value="<?php echo $row['DFatherName']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                    <div>
                        <label>mother name :- </label><input type="text" required name="DMotherName"
                            Value="<?php echo $row['DMotherName']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                </div>
            </fieldset>


            <fieldset>
                <legend>
                    <h3>Identy Details :- </h3>
                </legend>
                <div class="account-details">
                    <div>
                        <label>ID Card Type :- </label>
                        <select required name="DIDtype" <?php echo isFieldReadOnly(true); ?>>
                            <option disabled selected>
                                <?php echo $row['DIDtype']; ?>
                            </option>
                            <option value="Aadhaar Card">Aadhaar Card</option>
                            <option value="Voter Card">Voter Card</option>
                            <option value="Pan Card">Pan Card</option>
                            <option value="Driving Licence">Driving Licence</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <label>ID Card No :- </label><input type="text" required name="uDIdNo"
                            Value="<?php echo $row['DIdNo']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h3>Address Details</h3>
                </legend>
                <div class="account-details">
                    <div>
                        <label>Address Type :- </label>
                        <select required name="DAddType" <?php echo isFieldReadOnly(true); ?>>
                            <option disabled selected>
                                <?php echo $row['DAddType']; ?>
                            </option>
                            <option value="Permanent">Permanent</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>
                    <div>
                        <label>Area :- </label><input type="text" required name="DResArea"
                            Value="<?php echo $row['DResArea']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                    <div>
                        <label>State :- </label>
                        <select required name="DState" <?php echo isFieldReadOnly(true); ?>>
                            <option disabled selected>
                                <?php echo $row['DState']; ?>
                            </option>
                            <option value="Andaman & Nicobar Islands">Andaman & Nicobar Islands</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadra & Nagar Haveli">Dadra & Nagar Haveli</option>
                            <option value="Daman & Diu">Daman & Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div>
                        <label>district :- </label>
                        <select class="U-ifs" required name="DDist" <?php echo isFieldReadOnly(true); ?>>
                            <option disabled selected>
                                <?php echo $row['DDist']; ?>
                            </option>
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
                    <div>
                        <label>city :- </label><input type="text" required name="DCity"
                            Value="<?php echo $row['DCity']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                    <div>
                        <label>Full Address :- </label><input type="text" required name="DFullAdd"
                            Value="<?php echo $row['DFullAdd']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                    <div>
                        <label>Pincode :- </label><input type="text" required name="DPinCode"
                            Value="<?php echo $row['DPinCode']; ?>" <?php echo isFieldReadOnly(true); ?>>
                    </div>
                </div>
            </fieldset>

            <div class="col-md-12 btcon">
                <button id="editButton" class="col-sm-3 pbtns" type="button">Edit</button>
                <button id="saveButton" class="col-sm-3 pbtns" type="submit" style="display: none;"
                    name="UpdateDonerDeta">Save</button>
                <button id="cancelButton" class="col-sm-3 pbtns" type="button" style="display: none;">Cancel</button>
            </div>
            <script>
            $(document).ready(function() {
                // Initially set all input fields as read-only and remove borders
                $("input, select").attr("readonly", true).css("border", "none");

                // Handle the click event of the Edit button
                $("#editButton").click(function() {
                    // Make all input fields editable and restore borders
                    $("input, select").attr("readonly", false).css("border", "1px solid #ccc");

                    // Show the Save and Cancel buttons
                    $("#saveButton, #cancelButton, #Imgupfile").show();
                    // Hide the Edit button
                    $(this).hide();
                });

                // Handle the click event of the Cancel button
                $("#cancelButton").click(function() {
                    // Reload the page to discard any changes
                    location.reload();
                });
            });
            </script>
        </form>
    </div>
</body>

</html>






<?php
// Check if the form is submitted
require "dbconn.php";

if (isset($_POST['UpdateDonerDeta'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $DFullName = $_POST['DFullName'];
        $DDOB = $_POST['DDOB'];
        $DAge = $_POST['DAge'];
        $DMnum = $_POST['DMnum'];
        $uDEmail = $_POST['uDEmail'];
        $DGender = $_POST['DGender'];
        $DBGroup = $_POST['DBGroup'];
        $DOccup = $_POST['DOccup'];
        $DFatherName = $_POST['DFatherName'];
        $DMotherName = $_POST['DMotherName'];
        $DIDtype = $_POST['DIDtype'];
        $DIdNo = $_POST['DIdNo'];
        $DAddType = $_POST['DAddType'];
        $DState = $_POST['DState'];
        $DDist = $_POST['DDist'];
        $DCity = $_POST['DCity'];
        $DResArea = $_POST['DResArea'];
        $DFullAdd = $_POST['DFullAdd'];
        $DPinCode = $_POST['DPinCode'];
        // $ = $_POST[''];
        // $ = $_POST[''];


        // Connect to the database
        // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");



        if ($DEmail !== $uDEmail) {
            //  Create the SQL query
            // $query = "SELECT * FROM orgbloodbankregistration WHERE DEmail = '$DEmail'";
            $query = "SELECT * FROM donoruser WHERE DEmail = '$DEmail'";


            // Execute the query
            $result = mysqli_query($conn, $query);

            // Check if any rows were returned
            if (mysqli_num_rows($result) > 0) {
                // Email already exists in the database
                echo "<script>alert('Email Already exists you can login')</script>";
                // mysqli_close($conn);
                // header("Refresh:0");
                exit;
            }
        }

        if ($DIdNo !== $uDIdNo) {
            // Check if ID No already exists
            // $query = "SELECT * FROM orgbloodbankregistration WHERE DIdNo = '$DIdNo'";

            $query = "SELECT * FROM donoruser WHERE DEmail = '$DEmail'";

            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                echo "<script>alert('ID NO Already exists')</script>";
                // Perform necessary actions if user ID exists
                // ...
                // Close the database connection
                // mysqli_close($conn);
                // header("Refresh:0");
                exit;
            }
        }


        // Perform the database operation based on the selected operation
        if (isset($_POST['OrgReg'])) {

            // $password = password_hash($OrgBBNPassword, PASSWORD_DEFAULT);
            // $currentDate = date('d-m-Y');
            // $current = date('d-m-Y');
            // // $TokenID = (uniqid());
            // $tokenno = (rand(1,1000000000));

            // $TokenID = $currentDate . '' . $tokenno;
            // Create a message
            // $message = "Your Account Created Successfully. Your User ANme IS :- $OrgBBUserName";
            // Insert operation
            // $query = "INSERT INTO orgbloodbankregistration (OrgBBUserName, DFullName, DDOB, DAge, DMnum, uDEmail, DIdNo, DBGroup, DOccup, DFatherName, DMotherName, DIDtype, DState, DDist, DCity, OrgBBPassword, OrgBBACDate) VALUES ('$OrgBBUserName', '$DFullName', '$DDOB', '$DAge', '$DMnum', '$uDEmail', '$DIdNo', '$DBGroup', '$DOccup', '$DFatherName', '$DMotherName', '$DIDtype', '$DState', '$DDist', '$DCity', '$password', '$currentDate')";

            $query = "UPDATE  donoruser  SET DFullName ='$DFullName', DDOB ='$DDOB', DAge = '$DAge', DMnum = '$DMnum', DEmail ='$uDEmail', DGender ='$DGender', DBGroup ='$DBGroup', DOccup ='$DOccup', DFatherName ='$DFatherName', DMotherName ='$DMotherName', DIDtype ='$DIDtype', DState ='$DState', DDist ='$DDist', DCity ='$DCity', DResArea ='$DResArea', DFullAdd ='$DFullAdd', DPinCode ='$DPinCode', WHERE DUserName ='$DUserName'";
            if (mysqli_query($conn, $query)) {
                // echo "Record inserted successfully. your token no is :-" . $currentDate . "" . $TokenID;
                // Print the message in an alert
                // echo "<script>alert('$message');</script>";
                echo "<script>alert('Update Successfully')</script>";

            } else {
                // $message = "Error inserting record: " . mysqli_error($conn)."<a href='index.php'>Back to Form</a>";
                // echo "<script>alert('$message');</script>";
                echo "<script>alert('Reruest Not Sent')</script>";

            }
        }

        // Close the database connection
        mysqli_close($conn);
        header("Refresh:0");
        exit;
    }
}
?>