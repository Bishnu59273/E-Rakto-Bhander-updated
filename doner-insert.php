<?php



require 'db/dbconn.php';

if (isset($_POST['Dregsubmit'])) {
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        // $operation = $_POST['operation'];
        $DFullName = $_POST['DFullName'];
        $DDOB = $_POST['DDOB'];
        $DAge = $_POST['DAge'];
        $DMnum = $_POST['DMnum'];
        $DEmail = $_POST['DEmail'];
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
        $DUserName = $_POST['DUserName'];
        $DNPass = $_POST['DNPass'];
        $DCPass = $_POST['DCPass'];
        // $ = $_POST[''];
        // Connect to the database
        // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");



        //  Create the SQL query
        $query = "SELECT * FROM donoruser WHERE DEmail = '$DEmail'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Email already exists in the database
            echo "<script>alert('Email Already exists you can login')</script>";
            mysqli_close($conn);

            header("Refresh:0");
            exit;
        }

        // Check if user ID already exists
        $query = "SELECT * FROM donoruser WHERE DUserName = '$DUserName'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('User Name Already exists')</script>";
            // Perform necessary actions if user ID exists
            // ...

            // Close the database connection
            mysqli_close($conn);
            header("Refresh:0");

            exit;
        }


        // Check if ID No already exists
        $query = "SELECT * FROM donoruser WHERE DUserName = '$DIdNo'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('ID NO Already exists')</script>";
            // Perform necessary actions if user ID exists
            // ...
            // Close the database connection
            mysqli_close($conn);
            header("Refresh:0");

            exit;
        }
        // Check if new password and confirm password match
        if ($DNPass !== $DCPass) {
            echo "<script>alert('New password and confirm password Can't Match')</script>";
            // Perform necessary actions if passwords don't match
            // ...
            // Close the database connection
            mysqli_close($conn);

            header("Refresh:0");
            exit;
        }



        // Perform the database operation based on the selected operation
        if (isset($_POST['Dregsubmit'])) {
            $currentDate = date('d-m-Y');
            // $TokenID = (uniqid());
            // $TokenID = (rand(1,1000000000));
            $password = password_hash($DNPass, PASSWORD_DEFAULT);
            // Insert operation
            $query = "INSERT INTO donoruser (DUserName, DFullName, DDOB, DAge, DMnum, DEmail, DGender, DBGroup, DOccup, DFatherName, DMotherName, DIDtype, DIdNo, DAddType, DState, DDist, DCity, DResArea, DFullAdd, DPinCode, DNPass, DACDate) VALUES ('$DUserName','$DFullName','$DDOB','$DAge','$DMnum','$DEmail','$DGender','$DBGroup','$DOccup','$DFatherName','$DMotherName','$DIDtype','$DIdNo','$DAddType','$DState','$DDist','$DCity','$DResArea','$DFullAdd','$DPinCode','$password','$currentDate')";
            if (mysqli_query($conn, $query)) {
                // echo "Account Created successfully. your username is :-" . $DUserName;
                echo '<script>alert("Account Created successfully.")</script>';
                echo "<br>" . "<a href=index.php>Login</a>";
                // sleep(2);
                // header("location:index.php");
            } else {
                echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";
            }

        }

        // Close the database connection
        mysqli_close($conn);
        header("Refresh:0");
        exit;
    }
}

?>