<?php
$err = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $age = $_POST['age'] ?? '';

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $err[] = "Bad email";
    if (!is_numeric($age) || $age < 18) $err[] = "Age must be 18+";

    if (empty($err)) echo "Valid!";
    else print_r($err);
}
?>

<form method="POST">
    <input name="email" placeholder="Email" required>
    <input name="age" type="number" placeholder="Age" required>
    <button>Submit</button>
</form>
