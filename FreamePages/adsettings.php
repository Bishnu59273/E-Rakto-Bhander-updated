<?php

// Check if the form is submitted
if (isset($_POST['NadReg'])) {

  // Connect to the database
  // $conn = mysqli_connect("localhost", "root", "", "eraktobhander");
  require "dbconn.php";

  require '../db/Sanitaize.php';
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve the form data
    // $operation = $_POST['operation'];

    $AdminEmail = sanitizeInput($_POST['AdminEmail']);
    $AdminPassword = sanitizeInput($_POST['AdminPassword']);
    $adRePeatpass = sanitizeInput($_POST['adRePeatpass']);




    //  Create the SQL query
    $query = "SELECT * FROM adminuser WHERE AdminEmail = '$AdminEmail'";

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


    // Check if new password and confirm password match
    if ($AdminPassword !== $adRePeatpass) {
      echo "<script>alert('New password and confirm password Can't Match')</script>";
      // Perform necessary actions if passwords don't match
      // ...
      // Close the database connection
      mysqli_close($conn);
      header("Refresh:0");
      exit;
    }


    if (isset($_POST['NadReg'])) {
      $currentDate = date('Y-m-d');
      $password = password_hash($AdminPassword, PASSWORD_DEFAULT);
      // Insert operation
      $query = "INSERT INTO adminuser (AdminEmail, AdminPassword, AdminACDate) VALUES ('$AdminEmail','$password','$currentDate')";
      if (mysqli_query($conn, $query)) {
        // echo "Record inserted successfully. your token no is :-" . $currentDate . "" . $TokenID;
        // Print the message in an alert
        echo "<script>alert('New Admin Created Successfully');</script>";
        mysqli_close($conn);
        header("Refresh:0");
        exit;

      } else {
        echo "<script>alert('Not Complete')</script>";
        mysqli_close($conn);
        header("Refresh:0");
        exit;

      }
    }
  }

  // Close the database connection
  mysqli_close($conn);
  header("Refresh:0");

  // sleep(5);
  // header("Location: /E-Rakto-Bhander2.0");
  exit;

}
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Change Password
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mx-1 mx-md-4">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Change Password</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>


                    <div class="modal-body">

                        <div class="form-group col-sm-12 mb-3">
                            <input type="text" name="OldAdminPass" class="form-control w-100" required
                                placeholder="Enter Old Password">
                        </div>


                        <div class="form-group col-sm-12 mb-3">
                            <input type="password" name="NewAdminPass" class="form-control w-100"
                                pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$" required
                                title="Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character."
                                placeholder="Enter New Password">
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="text" name="CnfAdminPass" class="form-control w-100" required
                                placeholder="Enter Confirm Password">
                        </div>
                    </div>
                    <div class="modal-footer">

                        <button type="button" name="UpdatePass" class="btn btn-primary">Change</button>
                    </div>

                </form>
            </div>
        </div>
    </div>





    <!-- <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

        <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Create New Admin</p>

        <form action="<//?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="mx-1 mx-md-4">
            <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">
                    <input type="email" id="form3Example3c" class="form-control" name="AdminEmail" placeholder="Email"
                        required />
                    <label class="form-label" for="form3Example3c">Email</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="form3Example4c" class="form-control" name="AdminPassword"
                        placeholder=" Password" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$"
                        required
                        title="Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character." />
                    <label class="form-label" for="form3Example4c">Password</label>
                </div>
            </div>

            <div class="d-flex flex-row align-items-center mb-4">
                <div class="form-outline flex-fill mb-0">
                    <input type="password" id="form3Example4cd" class="form-control" name="adRePeatpass"
                        placeholder="Repeat your password" required />
                    <label class="form-label" for="form3Example4cd">Repeat your password</label>
                </div>
            </div>

            <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                <button type="Submit" name="NadReg" class="btn btn-primary btn-lg">Register</button>
            </div>

        </form>

    </div> -->


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Delete Account
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-sm-12 mb-3">
                        <input type="email" name="OldAdminPass" class="form-control w-100" required
                            placeholder="Enter Email">
                    </div>


                    <div class="form-group col-sm-12 mb-3">
                        <input type="password" name="NewAdminPass" class="form-control w-100"
                            pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{8,}$" required
                            title="Password must be at least 8 characters long and include at least one uppercase letter, one lowercase letter, one digit, and one special character."
                            placeholder="Enter Password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                </div>
            </div>
        </div>
    </div>





</body>

</html>