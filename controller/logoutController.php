<?php
session_start();

// Detect current directory depth
$isInViews = strpos($_SERVER['REQUEST_URI'], '/views/') !== false;

// Set correct path prefix
$basePath = $isInViews ? '../' : '';

// Destroy session
session_unset();
session_destroy();

// Remove cookies
setcookie('remember_email', '', time() - 3600, "/");
setcookie('remember_password', '', time() - 3600, "/");

// Redirect to login page
header("Location: {$basePath}/views/login.php");
exit();
?>
