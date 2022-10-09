<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    
</body>
</html>



<?php
    $admin = 0;

    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location: login_form.php');
    }
    require 'mydbms.php';
    $query = "SELECT * FROM users WHERE id=".$_SESSION['id'];
    $results=mysqli_query($con, $query) or die ("Nem sikerült ".$query);
    $record=mysqli_fetch_row($results);
    
    //var_dump($record[4]);
    $admin = $record[4];
    
    if($admin == 1)
    {
        header('Location: admin_panel.php');
    }
    elseif($admin == 0)
    {
        echo "Nem vagy admin!";
        echo "<br>";
        echo "<a href='index.php'>Vissza a főoldalra!</a>";
    }
    
?>