<?php
session_start();

// Remove session variables
$_SESSION = [];

// Destroy login session
session_destroy();

// Redirect to login page
header("Location: login.php");
exit();
?>