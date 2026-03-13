<?php
// load config
$config = require 'config.php';

// Access values
$dbHost = $config['db_host'];
$dbName = $config['db_name'];
$dbUser = $config['db_user'];
$dbPass = $config['db_pass'];
$appEnv = $config['app_env'];

// Example: connect to database securely
try {
    $pdo = new PDO(
        "mysql:host=$dbHost;dbname=$dbName;charset=utf8mb4",
        $dbUser,
        $dbPass
    );
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    if ($appEnv === 'development') {
        echo "DB Connection Error: " . $e->getMessage();
    } else {
        echo "DB Connection Error. Please try later.";
    }
    exit;
}