<?php
session_start();
include "config.php";

if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        
        $row = $result->fetch_assoc();

        if(password_verify($password, $row['password'])){
            
            $_SESSION['username'] = $username;
            header("Location: dashboard.php");

        }else{
            echo "Invalid Password";
        }

    }else{
        echo "User not found";
    }
}
?>

<form method="POST">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<button name="login">Login</button>
</form>
