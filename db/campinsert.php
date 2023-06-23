<?php

// Connect to the database
// $conn = mysqli_connect("localhost", "root", "", "eraktobhander");

    require "dbconn.php";
    
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
        // Perform the database operation based on the selected operation
        if (isset($_POST['Crequest'])) {

            $currentDate = date('dmY');
            $current = date('d-m-Y');
            // $TokenID = (uniqid());
            $tokenno = (rand(1,10000000000));

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
                
            }else {
                // $message = "Error inserting record: " . mysqli_error($conn)."<a href='index.php'>Back to Form</a>";
                // echo "<script>alert('$message');</script>";
                echo "<script>alert('Reruest Not Sent')</script>";
                mysqli_close($conn);
                header("Refresh:0");
                exit;
            }
        }
        // // Close the database connection
        // mysqli_close($conn);
        // header("Refresh:0");

        // exit;
    }else {
        echo "<script>alert('Wrong User NAme')</script>";

    }

    
    // Close the database connection
    
    // header("Refresh:0");
    // exit;
}
?>