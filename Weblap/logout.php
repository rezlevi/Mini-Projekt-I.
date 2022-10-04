<?php
    session_start();
    unset($_SESSION['id']);
    session_destroy();
    echo "Sikeresen kijelentkezett!";

    echo "<a href='login_form.php'>Vissza a bejelentkezéshez</a>";
?>

