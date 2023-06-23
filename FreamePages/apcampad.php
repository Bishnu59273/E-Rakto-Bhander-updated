<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <style>
    table {
        border: 1.5px solid black;
        /* width: 93vw;
        margin: 0px 46px; */
        background-color: rgb(191, 34, 41);
        /* width: 92%; */
        height: 19%;
        margin: 1% 1%;
    }

    th {
        /* padding: 0% 1%; */
        width: 10%;
        border: 1px solid black !important;
        text-align: center !important;
        font-family: sans-serif, Georgia, "Times New Roman", Times, serif;
        color: #ffffff;
    }

    td {
        background-color: #eeafaf;
        border: 1px solid black !important;
        text-align: center;
        font-size: 85%;
        font-weight: 500;
        color: black;
    }




    button {
        color: rgb(255, 255, 255);
        background-color: #2dbf1ad2;
        padding: auto;
        width: 90%;
        height: 50%;
        font-weight: 700 !important;
    }
    </style>


</head>

<body>

    <center>

        <div class="allcamp-show-con">


            <h3>New Camp Requests</h3>

            <?php


      require "dbconn.php";


      // Get the current date
      $currentDate = date('Y-m-d');

      // Construct the SQL query
      $sql = "SELECT * FROM campregister WHERE CmpApprove = '0' AND CampEDate >= '$currentDate'";

      // Execute the query
      $result = $conn->query($sql);
      $i = 0;
      // Check if any rows are returned
      if ($result->num_rows > 0) {
        // Output the data in an HTML table
        echo '<table border="1">';
        echo '<tr border="1">
              <th>SL No</th>
              <th>Registration NO</th>
              <th>Camp Name</th>
              <th>Details</th>
              <th>Address</th>
              <th>Organized By</th>
              <th>Organizer</th>
              <th>Conducted By</th>
              <th>Time</th>
              <th>Activation</th>
            </tr>
                ';
        while ($row = $result->fetch_assoc()) {

          // $camp_id = $row['Id'];
          $i++;
          echo '<tr>';
          echo '<td>' . $i . '</td>';
          echo '<td>' . $row['CampRegno'] . '</td>';
          echo '<td>' . $row['CampName'] . '</td>';
          echo '<td>Mobile No:-' . $row['COrgMnum'] . "<br>Email :-" . $row['COrgEmail'] . '</td>';
          echo '<td>' . $row['CampAdd'] . " <br>City :-" . $row['CampCity'] . " <br> Dist :-" . $row['CampDist'] . '</td>';
          echo '<td>' . $row['COrgname'] . " <br> Bank :-" . $row['CBBName'] . '</td>';
          echo '<td>' . $row['COrgnizername'] . '</td>';
          echo '<td>' . $row['CampSDate'] . " To " . $row['CampEDate'] . '</td>';
          echo '<td>Start :-' . $row['CStTime'] . "<br> End :-" . $row['CEndTime'] . '</td>';

          echo '<td>';
          echo '<form method="POST" action="">';
          echo '<input type="hidden" name="camp_id" value="' . $row['Id'] . '">';
          echo '<button type="submit" name="active_button">Active</button>';
          echo '</form>';
          echo '</td>';
          // echo '<td>' . . '</td>';
          // echo '<td>' . . '</td>';
          // echo '<td>' . . '</td>';
          echo '</tr>';
        }



        echo '</table>';
      } else {

        echo '<table border="1">';
        echo '<tr border="1">
                    <th>SL No</th>
                    <th>Registration NO</th>
                    <th>Camp Name</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Organized By</th>
                    <th>Organizer</th>
                    <th>Conducted By</th>
                    <th>Time</th>
                  </tr>
                ';
        echo "<script>
                    alert('No Active Camps for the selected district.')
                  </script>";
        echo '</table>';

      }



      // if (isset($_POST['active_button'])) {
      //     $camp_id = $_POST['camp_id'];
      if (isset($_POST['active_button']) && isset($_POST['camp_id'])) {
        $campId = $_POST['camp_id'];

        // Update the 'active' field to zero in the database for the selected camp
        $update_query = "UPDATE campregister SET CmpApprove = '1' WHERE Id = '$campId'";
        mysqli_query($conn, $update_query);
        if (mysqli_query($conn, $update_query)) {
          // echo "Account Created successfully. your username is :-" . $DUserName;
          echo '<script>alert("Camp Activated.")</script>';
          // sleep(2);
          // header("location:index.php");
        } else {
          echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";
        }


      }


      // Close the database connection
      // $conn->close();
      mysqli_close($conn);


      ?>


        </div>

    </center>
    <center>



        <div class="allcamp-show-con">


            <h3>Expaired Non Active Camp</h3>

            <?php


      require "dbconn.php";


      // Get the current date
      $currentDate = date('Y-m-d');

      // Construct the SQL query
      $sql = "SELECT * FROM campregister WHERE CmpApprove = '0' AND CampEDate <= '$currentDate' ORDER BY Id = 'DESC'";

      // Execute the query
      $result = $conn->query($sql);
      $i = 0;
      // Check if any rows are returned
      if ($result->num_rows > 0) {
        // Output the data in an HTML table
        echo '<table border="1">';
        echo '<tr border="1">
              <th>SL No</th>
              <th>Registration NO</th>
              <th>Camp Name</th>
              <th>Details</th>
              <th>Address</th>
              <th>Organized By</th>
              <th>Organizer</th>
              <th>Conducted By</th>
              <th>Time</th>
              <th>Activation</th>
            </tr>
                ';
        while ($row = $result->fetch_assoc()) {

          // $camp_id = $row['Id'];
          $i++;
          echo '<tr>';
          echo '<td>' . $i . '</td>';
          echo '<td>' . $row['CampRegno'] . '</td>';
          echo '<td>' . $row['CampName'] . '</td>';
          echo '<td>Mobile No:-' . $row['COrgMnum'] . "<br>Email :-" . $row['COrgEmail'] . '</td>';
          echo '<td>' . $row['CampAdd'] . " <br>City :-" . $row['CampCity'] . " <br> Dist :-" . $row['CampDist'] . '</td>';
          echo '<td>' . $row['COrgname'] . " <br> Bank :-" . $row['CBBName'] . '</td>';
          echo '<td>' . $row['COrgnizername'] . '</td>';
          echo '<td>' . $row['CampSDate'] . " To " . $row['CampEDate'] . '</td>';
          echo '<td>Start :-' . $row['CStTime'] . "<br> End :-" . $row['CEndTime'] . '</td>';

          echo '<td>';
          echo '<form method="POST" action="">';
          echo '<input type="hidden" name="camp_id" value="' . $row['Id'] . '">';
          echo '<button type="submit" name="active_button">Active</button>';
          echo '</form>';
          echo '</td>';
          // echo '<td>' . . '</td>';
          // echo '<td>' . . '</td>';
          // echo '<td>' . . '</td>';
          echo '</tr>';
        }



        echo '</table>';
      } else {

        echo '<table border="1">';
        echo '<tr border="1">
                    <th>SL No</th>
                    <th>Registration NO</th>
                    <th>Camp Name</th>
                    <th>Details</th>
                    <th>Address</th>
                    <th>Organized By</th>
                    <th>Organizer</th>
                    <th>Conducted By</th>
                    <th>Time</th>
                  </tr>
                ';
        echo "<script>
                    alert('No Active Camps for the selected district.')
                  </script>";
        echo '</table>';

      }



      // if (isset($_POST['active_button'])) {
      //     $camp_id = $_POST['camp_id'];
      if (isset($_POST['active_button']) && isset($_POST['camp_id'])) {
        $campId = $_POST['camp_id'];

        // Update the 'active' field to zero in the database for the selected camp
        $update_query = "UPDATE campregister SET CmpApprove = '1' WHERE Id = '$campId'";
        mysqli_query($conn, $update_query);
        if (mysqli_query($conn, $update_query)) {
          // echo "Account Created successfully. your username is :-" . $DUserName;
          echo '<script>alert("Camp Activated.")</script>';
          // sleep(2);
          // header("location:index.php");
        } else {
          echo "Error inserting record: " . mysqli_error($conn) . "<a href=index.php>Back to Form</a>";
        }


      }


      // Close the database connection
      // $conn->close();
      mysqli_close($conn);


      ?>


        </div>
    </center>

</body>

</html>