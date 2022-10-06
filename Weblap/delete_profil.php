<?php
    session_start();
    require 'mydbms.php';
    $con = mysqli_connect('localhost', 'root', '', 'mini_projekt_1', 3306);

    $nev = $_POST['nev'];
    $email = $_POST['email'];
    $jelszo = md5($_POST['jelszo']);
    $id = $_SESSION['id'];

    $query = "DELETE FROM users WHERE id= $id";
    $result = mysqli_query($con, $query) or die ("Nem sikerült ".$query);
    session_destroy();
    header('Location: index.php');
?>