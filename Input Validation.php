<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (empty($username) || empty($password)) {
        echo "Username and Password are required.";
    } else {
        echo "Input is valid.";
    }

}
?>

<form method="POST">
Username: <input type="text" name="username"><br>
Password: <input type="password" name="password"><br>
<button type="submit">Login</button>
</form>
