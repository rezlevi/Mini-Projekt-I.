<?php
    
    $con = mysqli_connect('localhost', 'root', '', 'mini_projekt_1', 3306);
    if(!isset($con))
        die('Hiba'.mysqli_errno($con));
    else return $con;
?>