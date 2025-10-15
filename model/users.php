<?php
$basePath = dirname(__DIR__);

require_once $basePath . '/config/db.php';

function insertUsers($user){
     $conn = getConnection();

    $sql = "INSERT INTO users (
        user_id,fullName, email, phone, password,
        created_at, updated_at, role
    ) VALUES (
        NULL,
        '{$user['fullName']}',
        '{$user['email']}',
        '{$user['phone']}',
        '{$user['password']}',
        '{$user['createdAt']}',
        '{$user['updatedAt']}',
        '{$user['role']}'
    )";

    $checkEmail = "SELECT * FROM users WHERE email = '{$user['email']}'";
    $result = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($result) == 0) {
        if (mysqli_query($conn, $sql)) {
            return true;
        } else {
            echo "Insert error: " . mysqli_error($conn);
            return false;
        }
    } else {
        return false;
    }
}

function getUserByEmail($email) {
    $conn = getConnection();
    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        return mysqli_fetch_assoc($result);
    }
    return false;
}

function loginUser($user){
    $conn = getConnection();
    
    $query = "SELECT * FROM users WHERE email = '{$user['email']}'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $info = mysqli_fetch_assoc($result);

        if (password_verify($user['password'], $info['password'])) {
            return $info;
        }
    }
    
    return false; 
}

function getAllUsers() {
    $conn = getConnection();
    $sql = "SELECT * FROM users WHERE role = 'user' ORDER BY user_id DESC";
    $result = mysqli_query($conn, $sql);

    $users = [];
    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row;
        }
    }
    return $users;
}
?>