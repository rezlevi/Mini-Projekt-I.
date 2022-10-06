<?php
    session_start();
    require 'mydbms.php';
    $con = mysqli_connect('localhost', 'root', '', 'beadando_feladat', 3306);

    $profilkep = $_POST['profilkep'];
    $nev = $_POST['nev'];
    $eletkor = $_POST['eletkor'];
    $email = $_POST['email'];
    $jelszo = md5($_POST['jelszo']);
    $id = $_SESSION['id'];

    $query = "DELETE FROM users WHERE id= $id";
    $result = mysqli_query($con, $query) or die ("Nem sikerült ".$query);
    session_destroy();
    header('Location: index.php');
?>