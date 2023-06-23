<?php

$conn = mysqli_connect("localhost", "root", "", "eraktobhander");

// if($conn){
//     echo '<script>alert("All Clear You May Procide")</script>';
// }else{
//     echo '<script>alert("Server Is Not Working" . $conn->connect_error)</script>';
// }

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>



