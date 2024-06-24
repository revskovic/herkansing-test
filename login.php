<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['loggedin'] = true;
        header('Location: ../index.php');
    } else {
        echo "Ongeldige inloggegevens.";
    }
}
?>

<form method="post" action="">
    Gebruikersnaam: <input type="text" name="username"><br>
    Wachtwoord: <input type="password" name="password"><br>
    <input type="submit" value="Login">
</form>