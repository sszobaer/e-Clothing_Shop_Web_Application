<?php
$basePath = dirname(__DIR__); 
require_once $basePath . '/model/users.php';

$users = getAllUsers();
?>