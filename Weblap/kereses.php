




<?php
    $nev = 0;


    if(isset($_POST['nev']))
    {
        $nev = $_POST['nev'];

        require 'mydbms.php';
        $query = "SELECT * FROM users WHERE username='$nev'";
        $result = mysqli_query($con, $query);
        $record = mysqli_fetch_all($result);
        
        var_dump($record[2]);
        $nev = $record[1];
        
        
        if(count($record) == 0) {
            echo "A megadott keresési adat helytelen, próbálja újra!";
            echo "<a href='kereses_form.php'>Vissza a kereséshez!</a>";
        }
        else 
        {
            
            //var_dump($record);
            //echo "Felhasználóneve: $record[2]";
            echo "<a href='index.php'>Vissza a főoldalra!</a>";

            
        }
    }
    else {
        echo "Adja meg a keresni való nevet!";
        echo "<a href='kereses_form.php'>Vissza a kereséshez</a>";
    }


?>