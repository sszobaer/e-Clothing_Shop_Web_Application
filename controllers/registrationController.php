<?php
require_once "../model/users.php"; // model file
date_default_timezone_set("Asia/Dhaka");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Collect and sanitize form inputs
    $fullName = trim($_POST['fullName']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirmPassword = trim($_POST['confirmPassword']);
    $phoneNo = isset($_POST['phone']) ? trim($_POST['phone']) : '';
    
    // print_r($_POST);

    if (empty($fullName) || empty($email) || empty($phoneNo) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required.";
        exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit;
    }

    if (strlen($password) < 8) {
        echo "Password must be at least 8 characters long.";
        exit;
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match.";
        exit;
    }

    $conn = getConnection();
    $user = [
        NULL,
        'fullName' => mysqli_real_escape_string($conn, $fullName),
        'email' => mysqli_real_escape_string($conn, $email),
        'phone' => mysqli_real_escape_string($conn, $phoneNo),
        'password' => password_hash($password, PASSWORD_BCRYPT),
        'createdAt' => date('Y-m-d H:i:s'),
        'updatedAt' => date('Y-m-d H:i:s'),
        'role' => 'user'
    ];

    if (insertUsers($user)) {
        echo "Registration successful! Redirecting to login...";
        header("refresh:2;url=../views/login.php"); // redirects after 2 seconds
        exit;
    } else {
        echo "Error: Failed to register user. Please try again.";
        exit;
    }

} else {
    echo "Something Went Wrong.";
    exit;
}
?>
