<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Kijelentkezés</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
<?php
    session_start();
    unset($_SESSION['id']);
    session_destroy();
    echo "Sikeresen kijelentkezett!";
    
    echo "<a href='login_form.php'>Vissza a bejelentkezéshez</a>";
?>
</body>
</html>

