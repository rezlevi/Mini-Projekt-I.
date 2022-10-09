<?php
// jelenlegi_valasztas: 3==ko ==papir 3==ollo
session_start();
$a = rand(1,3);
$b;
$maxpont = -1;


if(isset($_POST['ko_valaszt'])){
    $b = 1;
    $_SESSION['jelenlegi_jatek']++;
}
else if(isset($_POST['papir_valaszt'])){
    $b = 2;
    $_SESSION['jelenlegi_jatek']++;
 
}
else if(isset($_POST['ollo_valaszt'])){
    $b = 3;
    $_SESSION['jelenlegi_jatek']++;
}


$valasztas_jatekos = "";
if($b == 1){
    $valasztas_jatekos ="kő";
}
elseif($b == 2){
    $valasztas_jatekos ="papír";
}
elseif($b == 3){
    $valasztas_jatekos ="olló";
}


$valasztas_bot = "";

if($a == 1){
    $valasztas_bot = "kő";
}
if($a == 2){
    $valasztas_bot = "papír";
}
if($a == 3){
    $valasztas_bot = "olló";
}

require 'mydbms.php';
if(isset($_SESSION['id']))
{
$query = "SELECT * FROM statistics WHERE user_id=".$_SESSION['id'];
$result = mysqli_query($con, $query);
$record = mysqli_fetch_all($result);
$alls=$record[0][2];
$won = $record[0][3];
$lost = $record[0][4];
$draw = $record[0][5];
}


$eredmeny = null;
if(($b-$a)== 0) {
    $eredmeny = "Döntetlen!";
    $_SESSION['dontetlen']++;
    if(isset($_SESSION['id']))
    {
    $alls++;
    $draw++;
    $percentage = round(($won/$alls)*100,2);
    $query1 = "UPDATE statistics SET alls =$alls";
    $query2 = "UPDATE statistics SET draw =$draw";
    $query3 = "UPDATE statistics SET percentage =$percentage";
    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    }
}
if(($b == 1 && $a == 3) || ($b == 2 && $a == 1)  || ($b == 3 && $a == 2) ) {
    $eredmeny = "A játékos nyert!";
    $_SESSION['jatekospontja']++;
    if(isset($_SESSION['id']))
    {
        $alls++;
    $won++;
    $percentage = round(($won/$alls)*100,2);
    $query1 = "UPDATE statistics SET alls =$alls";
    $query2 = "UPDATE statistics SET won =$won";
    $query3 = "UPDATE statistics SET percentage =$percentage";
    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    }
    
}
if(($a == 1 && $b == 3) || ($a == 2 && $b == 1)  || ($a == 3 && $b == 2) ) {
    $eredmeny = "A gép nyert!";
    $_SESSION['botpontja']++;
    if(isset($_SESSION['id']))
    {
        $alls++;
    $lost++;
    $percentage = round(($won/$alls)*100,2);
    $query1 = "UPDATE statistics SET alls =$alls";
    $query2 = "UPDATE statistics SET lost =$lost";
    $query3 = "UPDATE statistics SET percentage =$percentage";
    $result1 = mysqli_query($con, $query1);
    $result2 = mysqli_query($con, $query2);
    $result3 = mysqli_query($con, $query3);
    }
    
}
if($_SESSION['jatekospontja'] == $_SESSION['maxpont'])
{
    header("Location: gamemode_select.php?nyert");
}
elseif($_SESSION['botpontja'] == $_SESSION['maxpont']){
    header("Location: gamemode_select.php?vesztett");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
<form align="center" action="index.php">
    <input type="submit" value="Vissza" />
    </form>
    <table align="center">
        <p align="center">Legutóbbi választásod: <?php
        echo($valasztas_jatekos) ?></p>

        <p align="center">Ellenfeled legutóbbi választása: <?php
        echo($valasztas_bot)?></p>

        <p align="center">Kör kimenetele: <?php echo($eredmeny)?></p>
        <br>

    </table>
    



<form align="center" action="game2.php" method="post">
    <tr>
        <td>
            <input type="submit" name="ko_valaszt" value="kő">
        </td>
        <td>
            <input type="submit" name="papir_valaszt" value="papír">
        </td>
        <td>
            <input type="submit" name="ollo_valaszt" value="olló">
        </td>
    </tr>
</form>

<table align="center" height:40vh; width:100vw>
    <tr>
        <td>
            <p>Jelenlegi pontjaid: 
                <br><?php 
                echo($_SESSION['maxpont']);
                echo("/");
                echo($_SESSION['jatekospontja']);?><p>
        </td>
        <td>
            <p>Döntetlenek:
                <br>
                 <?php
                echo($_SESSION['dontetlen']);
            ?><p>
        </td>
        <td>
            <p>Ellenfeled pontjai:
                <br> <?php
                echo($_SESSION['maxpont']);
                echo("/");
                echo($_SESSION['botpontja']);?></p>
        </td>

    </tr>
</table>

<form align="center" action="index.php">
    <input type="submit" value="Vissza" />
    </form>

</body>
</html>
