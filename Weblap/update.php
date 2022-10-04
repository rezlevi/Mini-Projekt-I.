<?php
    session_start();
    require 'mydbms.php';
    $con = mysqli_connect('localhost', 'root', '', 'mini_projekt_1', 3306);

    
    $username = $_POST['username'];
    
    $email = $_POST['email'];
    $jelszo = md5($_POST['jelszo']);
    $id = $_SESSION['id'];

    $query = "UPDATE users SET profilkep = username='$username',
     email='$email', jelszo='$jelszo' WHERE id=$id";
    $result = mysqli_query($con, $query);

    header('Location: sajat_profil.php');
    echo "<a href='login_form.php'>Vissza a bejelentkezéshez</a>";
?>