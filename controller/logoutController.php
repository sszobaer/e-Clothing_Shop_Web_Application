<?php
session_start();

// Destroy session
session_unset();
session_destroy();

// Remove cookies
setcookie('remember_email', '', time() - 3600, "/");
setcookie('remember_password', '', time() - 3600, "/");

// Define base URL for redirection
$baseUrl = "http://localhost/e-Clothing_Shop_Web_Application/";

// Redirect to login page
header("Location: " . $baseUrl . "views/login.php");
exit();
?>
