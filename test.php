<?php

// Connect to the database
  $conn = mysqli_connect("localhost", "root", "", "e-rakhtabhandar");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



if (isset($_POST['username'])) {

  // Retrieve the form data
      $username = $_POST['username'];
      $password = $_POST['password'];
      $cpassword = $_POST['cpassword'];
      $name = $_POST['name'];
      $userid = $_POST['userid'];
  //  Create the SQL query
  $query = "SELECT * FROM users WHERE username = '$username'";

  // Execute the query
  $result = mysqli_query($conn, $query);

  // Check if any rows were returned
  if (mysqli_num_rows($result) > 0) {
      // Email already exists in the database
      echo "<script>alert('Email Already exists you can login . ')</script>";
      mysqli_close($conn);
     
      header("Refresh:0");
      exit;
  }

  // Check if user ID already exists
$query = "SELECT * FROM users WHERE userid = '$userid'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    echo "<script>alert('User Id Already exists you can login . ')</script>";
    // Perform necessary actions if user ID exists
    // ...

    // Close the database connection
    mysqli_close($conn);
    header("Refresh:0");

    exit;
}
// Check if new password and confirm password match
if ($password !== $cpassword) {
    echo "<script>alert('New password and confirm password do not match.')</script>";
    // Perform necessary actions if passwords don't match
    // ...
    // Close the database connection
    mysqli_close($conn);
   
    header("Refresh:0");
    exit;
}
  
  
  
  
       
            // Perform the database operation based on the selected operation
            if (isset($_POST['insert'])) {
            // Insert operation
                $query = "INSERT INTO users (username, userid, password, name) VALUES ('$username', '$userid', '$password', '$name')";
                if (mysqli_query($conn, $query)) {
                    echo "<script>alert('Record inserted successfully. ')</script>";
                } else {
                    echo "<script>alert('Error Inserting record ')</script>" . mysqli_error($conn);
                }
            }
    
}
  
  
// Close the database connection
mysqli_close($conn);

?>






<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <div class="col-md-12">
    <form action="" class="u-form" method="post">
      <div class="input-field">
        <label class="U-ifh">Email</label>
        <input class="U-iff" name="username" type="text" placeholder="Enter your email" required />
      </div>

      <div class="input-field">
          <label class="U-ifh">User Name</label>
          <input class="U-iff" type="text" name="userid" placeholder="Enter user ID" required>
      </div>

      <div class="input-field">
        <label class="U-ifh">New Password</label>
        <input class="U-ifs" name="password" type="password" placeholder="Enter your New password" required />
      </div>

      <div class="input-field">
        <label class="U-ifh">Confirm Password</label>
        <input class="U-ifs" name="cpassword" type="password" placeholder="Confirm password" required />
      </div>
      <div class="input-field">
        <label class="U-ifh">Full Name</label>
        <input class="U-iff" type="text" name="name" placeholder="Enter your name" required />
      </div>
      <div class="buttons">
        <button name="insert">
          Submit
          <!-- <span class="btnText">Submit</span> -->
          <!-- <i class="uil uil-navigator"></i> -->
        </button>
      </div>
    </form>
  </div>
</body>

</html>