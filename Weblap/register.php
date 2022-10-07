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

        $query2 = "SELECT * FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query2);
        $record = mysqli_fetch_all($result);
      
        $value = $record[0][0];
        $query3 = "INSERT INTO statistics(user_id, alls, won, lost, draw, percentage)
        VALUES($value, 0,0,0,0,100)";
        mysqli_query($con, $query3) or die('Hiba:'.mysqli_errno($con));

        echo "Sikeres regisztráció!";
        echo "<a href='login_form.php'>Tovább a bejelentkezéshez</a>";
    }
    else {
        echo "Adja meg az összes mezőnek az értékét!";
        echo "<a href='register_form.php'>Vissza a regisztrációhoz</a>";
    }
?>