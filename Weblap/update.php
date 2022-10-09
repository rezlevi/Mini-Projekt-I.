<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adatmódosító</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
<?php
    session_start();
    require 'mydbms.php';
    $con = mysqli_connect('localhost', 'root', '', 'mini_projekt_1', 3306);

    
    $username = $_POST['username'];
    
    $email = $_POST['email'];
    $jelszo = md5($_POST['jelszo']);
    $id = $_SESSION['id'];

    $query2 = "SELECT * FROM users WHERE username='$username' AND id<>$id ";
    $result2 = mysqli_query($con, $query2);
    $record = mysqli_fetch_all($result2);
    
    if($record == null)
    {
        $query = "UPDATE users SET username='$username',
        email='$email', jelszo='$jelszo' WHERE id=$id";
        $result = mysqli_query($con, $query);

        header('Location: updated.php');
    }
    else
    {
        echo "A felhasználónév már foglalt!";
        echo "<a href='register_form.php'>Vissza a regisztrációhoz</a>";
    }
?>
</body>
</html>