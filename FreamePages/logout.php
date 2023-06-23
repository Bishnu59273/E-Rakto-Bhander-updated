<?php

// Start session
session_start();

// Delete user from session
unset($_SESSION['dlogged_in']);
unset($_SESSION['DEmail']);
unset($_SESSION['DUserName']);


unset($_SESSION['ologged_in']);
unset($_SESSION['ORgBBEmail']);
// unset($_SESSION['DUserName']);



// Destroy session
session_destroy();

// Redirect to home page
header("Location: ../index.php"); 

?>