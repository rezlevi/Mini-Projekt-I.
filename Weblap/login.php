<?php
    if(isset($_POST['username']) && isset($_POST['jelszo']))
    {
        $username = $_POST['username'];
        $jelszo = md5($_POST['jelszo']);

        require 'mydbms.php';
        $query = "SELECT * FROM users WHERE username='$username' AND jelszo='$jelszo'";
        $result = mysqli_query($con, $query);
        $record = mysqli_fetch_all($result);
        var_dump($record);
        if(count($record) == 0) {
            echo "A megadott bejelentkezési adatok helytelenek, próbálja újra!";
            echo "<a href='login_form.php'>Vissza a bejelentkezéshez</a>";
        }
        else {
            session_start();
            $_SESSION['id'] = $record[0][0];
            header('Location: index.php');
        }
    }
    else {
        echo "Adja meg az összes mezőnek az értékét!";
        echo "<a href='login_form.php'>Vissza a bejelentkezéshez</a>";
    }


?>