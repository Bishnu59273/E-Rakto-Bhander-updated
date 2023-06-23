<?php
// Check if the form is submitted
require "dbconn.php";


if (isset($_POST['OrgReg'])) {

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Retrieve the form data
        $OrgBBUserName = $_POST['OrgBBUserName'];
        $OrgBBname = $_POST['OrgBBname'];
        $OrgBBType = $_POST['OrgBBType'];
        $ORgBBEmail = $_POST['ORgBBEmail'];
        $OrgMNum = $_POST['OrgMNum'];
        $OrgBBAIDName = $_POST['OrgBBAIDName'];
        $OrgBBAIDNum = $_POST['OrgBBAIDNum'];
        $OrgBBDist = $_POST['OrgBBDist'];
        $OrgBBCity = $_POST['OrgBBCity'];
        $OrgBBFullAdd = $_POST['OrgBBFullAdd'];
        $OrgBBHeadName = $_POST['OrgBBHeadName'];
        $OrgBBHPName = $_POST['OrgBBHPName'];
        $OrgBBHMNum = $_POST['OrgBBHMNum'];
        $OrgBBHEmail = $_POST['OrgBBHEmail'];
        $OrgBBNumMember = $_POST['OrgBBNumMember'];
        $OrgBBNPassword = $_POST['OrgBBNPassword'];
        $OrgBBCPassword = $_POST['OrgBBCPassword'];
        // $ = $_POST[''];
        // $ = $_POST[''];


        // Connect to the database
        // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");




        //  Create the SQL query
        $query = "SELECT * FROM orgbloodbankregistration WHERE ORgBBEmail = '$ORgBBEmail'";

        // Execute the query
        $result = mysqli_query($conn, $query);

        // Check if any rows were returned
        if (mysqli_num_rows($result) > 0) {
            // Email already exists in the database
            echo "<script>alert('Email Already exists you can login')</script>";
            mysqli_close($conn);

            // header("Refresh:0");
            // exit;
        }


        // Check if user ID already exists
        $query = "SELECT * FROM orgbloodbankregistration WHERE OrgBBUserName = '$OrgBBUserName'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('User Name Already exists')</script>";
            // Perform necessary actions if user ID exists
            // ...

            // Close the database connection
            mysqli_close($conn);
            // header("Refresh:0");

            // exit;
        }


        // Check if ID No already exists
        $query = "SELECT * FROM orgbloodbankregistration WHERE OrgBBAIDNum = '$OrgBBAIDNum'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('ID NO Already exists')</script>";
            // Perform necessary actions if user ID exists
            // ...
            // Close the database connection
            mysqli_close($conn);
            // header("Refresh:0");
            // exit;
        }


        // Check if new password and confirm password match
        if ($OrgBBNPassword !== $OrgBBCPassword) {
            echo "<script>alert('New password and confirm password Can't Match')</script>";
            // Perform necessary actions if passwords don't match
            // ...
            // Close the database connection
            mysqli_close($conn);
            // header("Refresh:0");
            // exit;
        }

        // Perform the database operation based on the selected operation
        if (isset($_POST['OrgReg'])) {

            $password = password_hash($OrgBBNPassword, PASSWORD_DEFAULT);
            $currentDate = date('d-m-Y');
            // $current = date('d-m-Y');
            // // $TokenID = (uniqid());
            // $tokenno = (rand(1,1000000000));

            // $TokenID = $currentDate . '' . $tokenno;
            // Create a message
            $message = "Your Account Created Successfully. Your User ANme IS :- $OrgBBUserName";
            // Insert operation
            $query = "INSERT INTO orgbloodbankregistration (OrgBBUserName, OrgBBname, OrgBBType, ORgBBEmail, OrgMNum, OrgBBAIDName, OrgBBAIDNum, OrgBBDist, OrgBBCity, OrgBBFullAdd, OrgBBHeadName, OrgBBHPName, OrgBBHMNum, OrgBBHEmail, OrgBBNumMember, OrgBBPassword, OrgBBACDate) VALUES ('$OrgBBUserName', '$OrgBBname', '$OrgBBType', '$ORgBBEmail', '$OrgMNum', '$OrgBBAIDName', '$OrgBBAIDNum', '$OrgBBDist', '$OrgBBCity', '$OrgBBFullAdd', '$OrgBBHeadName', '$OrgBBHPName', '$OrgBBHMNum', '$OrgBBHEmail', '$OrgBBNumMember', '$password', '$currentDate')";
            if (mysqli_query($conn, $query)) {
                // echo "Record inserted successfully. your token no is :-" . $currentDate . "" . $TokenID;
                // Print the message in an alert
                echo "<script>alert('$message');</script>";

            } else {
                // $message = "Error inserting record: " . mysqli_error($conn)."<a href='index.php'>Back to Form</a>";
                // echo "<script>alert('$message');</script>";
                echo "<script>alert('Reruest Not Sent')</script>";
                 echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";

            }
        }

        // Close the database connection
        mysqli_close($conn);
        // header("Refresh:0");
        // exit;
    }
}
?>