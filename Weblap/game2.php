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
$query = "SELECT * FROM statistics WHERE user_id=".$_SESSION['id'];
$result = mysqli_query($con, $query);
$record = mysqli_fetch_all($result);
$alls=$record[0][2];
$won = $record[0][3];
$lost = $record[0][4];
$draw = $record[0][5];

$eredmeny = null;
if(($b-$a)== 0) {
    $eredmeny = "Döntetlen!";
    $_SESSION['dontetlen']++;
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
if(($b == 1 && $a == 3) || ($b == 2 && $a == 1)  || ($b == 3 && $a == 2) ) {
    $eredmeny = "A játékos nyert!";
    $_SESSION['jatekospontja']++;
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
if(($a == 1 && $b == 3) || ($a == 2 && $b == 1)  || ($a == 3 && $b == 2) ) {
    $eredmeny = "A gép nyert!";
    $_SESSION['botpontja']++;
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
</head>
<body>
<form action="game2.php" method="post">

<tr>
    <td>
        <input type="submit" name="ko_valaszt" value="ko">
    </td>
    <td>
        <input type="submit" name="papir_valaszt" value="papir">
    </td>
    <td>
        <input type="submit" name="ollo_valaszt" value="ollo">
    </td>
</tr>
</form>
    <table>
        <a>Legutóbbi választásod: <?php
        echo($valasztas_jatekos) ?></a>
        <br>
        <a>Ellenfeled legutóbbi választása: <?php
        echo($valasztas_bot)?></a>
        <br>
        <a>Kör kimenetele: <?php echo($eredmeny)?></a>

    </table>

<table>
    <tr>
        <td>
            <a>Jelenlegi pontjaid: <?php 
                echo($_SESSION['maxpont']);
                echo("/");
                echo($_SESSION['jatekospontja']);?></a>
            <br>
            <a><?php ?></a>
        </td>
        <td>
            <a>Ellenfeled pontjai: <?php
                echo($_SESSION['maxpont']);
                echo("/");
                echo($_SESSION['botpontja']);?></a>
            <br>
            <a><?php ?></a>
        </td>
        <td>
            <a>Döntetlenek: <?php
                echo($_SESSION['dontetlen']);
            ?>
        </td>
    </tr>
</table>

</body>
</html>
