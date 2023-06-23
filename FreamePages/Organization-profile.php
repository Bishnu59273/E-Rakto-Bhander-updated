<?php
session_start();
// Check if session is set
if (isset($_SESSION['ologged_in']) || $_SESSION['ologged_in'] == true) {

    // Get session data
    $ORgBBEmail = $_SESSION['ORgBBEmail'];

    // // Connect to MySQLi
    // $mysqli = new mysqli('localhost', 'root', '', 'e-rakhtabhandar');

    require 'dbconn.php';

    // Check if user exists in database
    $sql = "SELECT * FROM orgbloodbankregistration WHERE ORgBBEmail = '$ORgBBEmail'";
    $result = $conn->query($sql);

    // If user exists, display welcome message
    if ($result->num_rows > 0) {

        // Get user data from database
        $row = $result->fetch_assoc();
        $OrgBBUserName = $row['OrgBBUserName'];
        // $name = $row['name'];
        $OrgBBname = $row['OrgBBname'];
        $OrgBBType = $row['OrgBBType'];
        // $ORgBBEmail = $row['ORgBBEmail'];
        $OrgMNum = $row['OrgMNum'];
        $OrgBBAIDName = $row['OrgBBAIDName'];
        $OrgBBAIDNum = $row['OrgBBAIDNum'];
        $OrgBBDist = $row['OrgBBDist'];
        $OrgBBCity = $row['OrgBBCity'];
        $OrgBBFullAdd = $row['OrgBBFullAdd'];
        $OrgBBHeadName = $row['OrgBBHeadName'];
        $OrgBBHEmail = $row['OrgBBHEmail'];
        $OrgBBHPName = $row['OrgBBHPName'];
        $OrgBBHMNum = $row['OrgBBHMNum'];
        $OrgBBNumMember = $row['OrgBBNumMember'];

        $OrgBBLastLogin = $row['OrgBBLastLogin'];

        // echo "Welcome, $name!";

    } else {

        // User does not exist, redirect to login page
        mysqli_close($conn);
        header('Location: /index.php');
        exit;
    }

} else {

    // Session is not set, redirect to login page
    mysqli_close($conn);
    header('Location: /index.php');
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
</head>

<body>
    <div class="main-block">
        <form id="profileForm" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <fieldset>
                <legend>
                    <h3>Welcome
                        <?php echo $row['OrgBBUserName']; ?>
                    </h3>
                </legend>
                <div class="account-details">
                    <span class="profile-pic-div">
                        <img src="about1.png" id="photo" />

                    </span>
                </div>
            </fieldset>

            <fieldset class="udif-n">
                <div>
                    <span>
                        <input type="file" id="Imgupfile" style="display: none;">
                        <input type="text" class="udif" value="<?php echo $OrgBBUserName; ?>" disabled>
                    </span>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h3>Details</h3>
                </legend>
                <div class="personal-details">
                    <div>
                        <div>
                            <label>Orgnization Name: :- </label><input type="text" required name="OrgBBname"
                                Value="<?php echo $OrgBBname; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>

                        <div>
                            <label>Email :- </label><input type="text" required name="uORgBBEmail"
                                Value="<?php echo $ORgBBEmail; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Mobile No :- </label><input type="text" required name="OrgMNum"
                                Value="<?php echo $OrgMNum; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>

                        <div>
                            <label>Id-Proof Name:- </label><input type="text" required name="OrgBBAIDName"
                                Value="<?php echo $OrgBBAIDName; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>ID Number :- </label><input type="text" required name="uOrgBBAIDNum"
                                Value="<?php echo $OrgBBAIDNum; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Dist :-</label>
                            <select name="OrgBBDist" required <?php echo isFieldReadOnly(true); ?>>
                                <option disabled selected><?php echo $OrgBBDist; ?></option>
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
                            <label>City :-</label><input type="text" required name="OrgBBCity"
                                Value="<?php echo $OrgBBCity; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Address :-</label><input type="text" required name="OrgBBFullAdd"
                                Value="<?php echo $OrgBBFullAdd; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Head Of The Organaigation Name :-</label><input row="3" type="text" required
                                name="OrgBBHeadName" Value="<?php echo $OrgBBHeadName; ?>"
                                <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Pozition Name :-</label><input type="text" required name="OrgBBHPName"
                                Value="<?php echo $OrgBBHPName; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Head Of The Organaigation Mobile Number :-</label><input type="text" required
                                name="OrgBBHMNum" Value="<?php echo $OrgBBHMNum; ?>"
                                <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Head Of The Organaigation Email Id :-</label><input type="text" required
                                name="OrgBBHEmail" Value="<?php echo $OrgBBHEmail; ?>"
                                <?php echo isFieldReadOnly(true); ?>>
                        </div>
                        <div>
                            <label>Number Of Member's :-</label><input type="text" required name="OrgBBNumMember"
                                Value="<?php echo $OrgBBNumMember; ?>" <?php echo isFieldReadOnly(true); ?>>
                        </div>
                    </div>
                </div>
            </fieldset>


            <div class="col-md-12 btcon">
                <button id="editButton" class="col-sm-3 pbtns" type="button">Edit</button>
                <button id="saveButton" class="col-sm-3 pbtns" type="submit" style="display: none;"
                    class="Updateorgdeta">Save</button>
                <button id="cancelButton" class="col-sm-3 pbtns" type="button" style="display: none;">Cancel</button>
            </div>
        </form>
    </div>
</body>

</html>



<?php
// Check if the form is submitted
require "dbconn.php";

if (isset($_POST['Updateorgdeta'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $OrgBBname = $_POST['OrgBBname'];
        $OrgBBType = $_POST['OrgBBType'];
        $uORgBBEmail = $_POST['uORgBBEmail'];
        $OrgMNum = $_POST['OrgMNum'];
        $OrgBBAIDName = $_POST['OrgBBAIDName'];
        $uOrgBBAIDNum = $_POST['uOrgBBAIDNum'];
        $OrgBBDist = $_POST['OrgBBDist'];
        $OrgBBCity = $_POST['OrgBBCity'];
        $OrgBBFullAdd = $_POST['OrgBBFullAdd'];
        $OrgBBHeadName = $_POST['OrgBBHeadName'];
        $OrgBBHPName = $_POST['OrgBBHPName'];
        $OrgBBHMNum = $_POST['OrgBBHMNum'];
        $OrgBBHEmail = $_POST['OrgBBHEmail'];
        $OrgBBNumMember = $_POST['OrgBBNumMember'];
        // $OrgBBNPassword = $_POST['OrgBBNPassword'];
        // $OrgBBCPassword = $_POST['OrgBBCPassword'];
        // $ = $_POST[''];
        // $ = $_POST[''];


        // Connect to the database
        // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");



        if ($ORgBBEmail !== $uORgBBEmail) {
            //  Create the SQL query
            $query = "SELECT * FROM orgbloodbankregistration WHERE ORgBBEmail = '$ORgBBEmail'";

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

        if ($OrgBBAIDNum !== $uOrgBBAIDNum) {
            // Check if ID No already exists
            $query = "SELECT * FROM orgbloodbankregistration WHERE OrgBBAIDNum = '$OrgBBAIDNum'";
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
            // $query = "INSERT INTO orgbloodbankregistration (OrgBBUserName, OrgBBname, OrgBBType, ORgBBEmail, OrgMNum, OrgBBAIDName, OrgBBAIDNum, OrgBBDist, OrgBBCity, OrgBBFullAdd, OrgBBHeadName, OrgBBHPName, OrgBBHMNum, OrgBBHEmail, OrgBBNumMember, OrgBBPassword, OrgBBACDate) VALUES ('$OrgBBUserName', '$OrgBBname', '$OrgBBType', '$ORgBBEmail', '$OrgMNum', '$OrgBBAIDName', '$OrgBBAIDNum', '$OrgBBDist', '$OrgBBCity', '$OrgBBFullAdd', '$OrgBBHeadName', '$OrgBBHPName', '$OrgBBHMNum', '$OrgBBHEmail', '$OrgBBNumMember', '$password', '$currentDate')";

            $query = "UPDATE  orgbloodbankregistration  SET OrgBBname ='$OrgBBname', OrgBBType ='$OrgBBType', ORgBBEmail = '$uORgBBEmail', OrgMNum = '$OrgMNum', OrgBBAIDName ='$OrgBBAIDName', OrgBBAIDNum ='$uOrgBBAIDNum', OrgBBDist ='$OrgBBDist', OrgBBCity ='$OrgBBCity', OrgBBFullAdd ='$OrgBBFullAdd', OrgBBHeadName ='$OrgBBHeadName', OrgBBHPName ='$OrgBBHPName', OrgBBHMNum ='$OrgBBHMNum', OrgBBHEmail ='$OrgBBHEmail', OrgBBNumMember ='$OrgBBNumMember', WHERE OrgBBUserName ='$OrgBBUserName'";
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