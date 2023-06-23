
<?php
// Check if the form is submitted
if (isset($_POST['BRequest'])) {

    // Connect to the database
    // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");
     require "db/dbconn.php";



    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Retrieve the form data
        // $operation = $_POST['operation'];
        $BLG = $_POST['BLG'];
        $unit = $_POST['unit'];
        $pname = $_POST['pname'];
        $paddress = $_POST['paddress'];
        $phnumber = $_POST['phnumber'];
        $TSA = $_POST['TSA'];
        $NBB = $_POST['NBB'];
    
        // Perform the database operation based on the selected operation
        // if (isset($_POST['BRequest'])) {

            $currentDate = date('dmY');
            // $TokenID = (uniqid());
            $tokenno = (rand(1,1000000000));

            $TokenID = $currentDate . '' . $tokenno;
            // Create a message
            $message = "Your Request Submited. your tokenno is :- $TokenID";
            // Insert operation
            $query = "INSERT INTO requestblood (TokenID, BLG, unit, pname, paddress, phnumber, TSA, NBB) VALUES ('$TokenID','$BLG','$unit','$pname','$paddress','$phnumber','$TSA','$NBB')";
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
        // }
    }

    // Close the database connection
    mysqli_close($conn);
    header("Refresh:0");

    // sleep(5);
    // header("Location: /E-Rakto-Bhander2.0");
    exit;
    
}
?>


<style>
/* blood request form css start */
.brl {
    color: #bf222b !important;
    font-weight: 600 !important;

}
/* blood request form css End */
</style>


<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">




<label class="brl col-sm-5" for="">Blood Group* : </label>
<input class="col-sm-6" type="text" name="BLG">

<br>

<label class="brl col-sm-5" for="">Select Blood Unit* :</label>
<select class="col-sm-6" name="unit">
    <!-- <option>Unit</option> -->
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
</select>

<br>

<label class="brl col-sm-5" for=""> Percent Name* : </label>
<input class="col-sm-6" type="text" name="pname">

<br>

<label class="brl  col-sm-5" for=""> Percent Addres* : </label>
<input class="col-sm-6" type="text" name="paddress">

<br>

<label class="brl  col-sm-5" for=""> Phone Number*: </label>
<input class="col-sm-6" type="text" name="phnumber">

<br>

<label class="brl  col-sm-5" for=""> Thalassemia* :</label>
<select class="col-sm-6" name="TSA">
    <!-- <option>Unit</option> -->
    <option value="NO">NO</option>
    <option value="Yes">Yes</option>
    <!-- <option>3</option> -->
</select>

<br>

<label class="brl  col-sm-5" for=""> Select Nearest Blood Bank : </label>
<select class="col-sm-6" name="NBB">
    <!-- <option>Unit</option> -->
    <option value="Select">Select</option>
    <option value="Kaliyaganj">Islampur</option>
    <option value="Raiganj">Raiganj</option>
    <option value="Other">Other</option>
    <!-- <option><input type="text" placeholder=""></option> -->

    <!-- <input type="text"> -->
</select>
<br>
<button type="button" class="btn btn-secondary brClose col-sm-5"
    data-bs-dismiss="modal">Close</button>
<button type="submit" class="btn btn-primary col-sm-5" name="BRequest">Submit
    Request</button>
</form>

