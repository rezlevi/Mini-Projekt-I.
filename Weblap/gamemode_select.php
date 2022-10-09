<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
            session_start();
            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    ?>
    <form action="index.php" align="right">
    <input type="submit" value="Vissza" />
    </form>
    <?php
        if(strpos($fullUrl, "nyert") == true || strpos($fullUrl, "vesztett") == true){
            echo('<p align="center">Új játék?</p>');
        }
    ?>
    <form align="center" method="POST" action="game.php">
        <label for="jatekmod">Válassz játékmódot:</label>
        <select id="jatekmod" name="jatekmod" size="1">
            <option value="Bo1">Best of 1</option>
            <option value="Bo3">Best of 3</option>
            <option value="Bo5">Best of 5</option>
        </select>
        <?php
        $_SESSION['jelenlegi_jatek'] = 0;
        ?>
        <input type="submit" value="Választ" name="jatekmod_gomb">
    </form>
    <?php
                    if(strpos($fullUrl, "nyert") == true){
                        echo('<br>');
                        echo("Előző meccsed eredményei:");
                        echo('<br>');
                        echo('<br>');
                        echo("Megnyerted a meccset!");
                        echo('<br>');
                        echo("Végleges pontjaid:"); 
                        echo($_SESSION['jatekospontja']);
                        echo('<br>');
                        echo("Ellenfeled végleges pontjai:");
                        echo($_SESSION['botpontja']);
                        echo('<br>');
                    }
                    else if(strpos($fullUrl, "vesztett") == true){
                        echo('<br>');
                        echo("Előző meccsed eredményei:");
                        echo('<br>');
                        echo('<br>');
                        echo("Elvesztetted a meccset!");
                        echo('<br>');
                        echo("Végleges pontjaid:"); 
                        echo($_SESSION['jatekospontja']);
                        echo('<br>');
                        echo("Ellenfeled végleges pontjai:");
                        echo($_SESSION['botpontja']);
                        echo('<br>');
                        
                    }
    ?>


</body>
</html>
