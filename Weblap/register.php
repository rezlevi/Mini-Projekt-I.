<?php
    if( isset($_POST['username'])
     && isset($_POST['email'])
     && isset($_POST['jelszo'])) 
     {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $jelszo = md5($_POST['jelszo']);
    
        require 'mydbms.php';
        $query = "INSERT INTO users(username, email, jelszo)
         VALUES('$username', '$email', '$jelszo')";
        mysqli_query($con, $query) or die('Hiba:'.mysqli_errno($con));

        echo "Sikeres regisztráció!";
        echo "<a href='login_form.php'>Tovább a bejelentkezéshez</a>";
    }
    else {
        echo "Adja meg az összes mezőnek az értékét!";
        echo "<a href='register_form.php'>Vissza a regisztrációhoz</a>";
    }
?>