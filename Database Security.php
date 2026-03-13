<?php
$conn = new mysqli("localhost", "root", "", "login_system");

if ($conn->connect_error) {
    die("Connection failed");
}

$username = $_POST['username'];
$password = $_POST['password'];

// Prepared statement for security
$stmt = $conn->prepare("SELECT * FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
    echo "User found";
} else {
    echo "User not found";
}
?>
