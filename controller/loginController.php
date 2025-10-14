<?php
require_once "../config/db.php";
require_once "../model/users.php";
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Collect and sanitize input
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');
    $remember = isset($_POST['rememberMe']);

    // ===== BASIC BACKEND VALIDATION =====
    if (empty($email) || empty($password)) {
        echo "All fields are required.";
        exit();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format.";
        exit();
    }

    if (strlen($password) < 6) {
        echo "Password must be at least 6 characters.";
        exit();
    }

    // ===== CHECK USER FROM DATABASE =====
    $user = getUserByEmail($email);

    if ($user && password_verify($password, $user['password'])) {

        // ===== SESSION SETUP =====
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['fullName'] = $user['fullName'];
        $_SESSION['phone'] = $user['phone'];
        $_SESSION['createdAt'] = $user['createdAt'];
        $_SESSION['updatedAt'] = $user['updatedAt'];
        $_SESSION['role'] = $user['role'];
        $_SESSION['logged_in'] = true;

        // ===== REMEMBER ME COOKIES =====
        if ($remember) {
            setcookie('remember_email', $email, time() + (86400 * 7), "/");
            setcookie('remember_token', bin2hex(random_bytes(16)), time() + (86400 * 7), "/");
        } else {
            setcookie('remember_email', '', time() - 3600, "/");
            setcookie('remember_token', '', time() - 3600, "/");
        }

        // ===== ROLE-BASED REDIRECTION =====
        if ($_SESSION['role'] === 'admin') {
            header("Location: ../views/admin/dashboard.php");
            exit();
        } elseif ($_SESSION['role'] === 'user') {
            header("Location: ../views/user/dashboard.php");
            exit();
        } else {
            session_destroy();
            echo "Unauthorized user role.";
            exit();
        }

    } else {
        echo "Invalid email or password.";
        exit();
    }

} else {
    echo "Invalid request method.";
    exit();
}
?>
