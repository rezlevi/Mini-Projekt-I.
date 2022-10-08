<?php
// jelenlegi_valasztas: 3==ko ==papir 3==ollo
session_start();
$a = rand(1,3);


$valasztas_jatekos = "";
if($_SESSION['jelenlegivalasztas'] == 1){
    $valasztas_jatekos ="kő";
}
elseif($_SESSION['jelenlegivalasztas'] == 2){
    $valasztas_jatekos ="papír";
}
elseif($_SESSION['jelenlegivalasztas'] == 3){
    $valasztas_jatekos ="olló";
}


$valasztas_bot = "";

if($a == 1){
    $valasztas_bot = "olló";
}
if($a == 2){
    $valasztas_bot = "papír";
}
if($a == 3){
    $valasztas_bot = "kő";
}


$eredmeny = null;
if(($_SESSION['jelenlegivalasztas']-$a) % 3 == 0) {
    $eredmeny = 1;
}
if(($_SESSION['jelenlegivalasztas']-$a) % 3 == 1) {
    $eredmeny = 2;
}
if(($_SESSION['jelenlegivalasztas']-$a) % 3 == 2) {
    $eredmeny = 3;
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
<?php
if(isset($_POST['ko_valaszt'])){
    $_SESSION['jelenlegivalasztas'] = 1;
    $_SESSION['jelenlegi_jatek']++;
}
else if(isset($_POST['papir_valaszt'])){
    $_SESSION['jelenlegivalasztas'] = 2;
    $_SESSION['jelenlegi_jatek']++;
 
}
else if(isset($_POST['ollo_valaszt'])){
    $_SESSION['jelenlegivalasztas'] = 3;
    $_SESSION['jelenlegi_jatek']++;
}
?>
</form>
    <table>
        <a>Legutóbbi választásod: <?php echo($valasztas_jatekos) ?></a>
        <br>
        <a>Ellenfeled legutóbbi választása: <?php echo($valasztas_bot)?></a>
        <br>
        <a>Kör kimenetele: <?php echo($eredmeny)?></a>

    </table>

<table>
    <tr>
        <td>
        <a>Jelenlegi pontjaid:</a>
        <br>
        <a><?php ?></a>
        </td>
        <td>
            <a>Ellenfeled pontjai:</a>
            <br>
            <a><?php ?></a>
        </td>
    </tr>
</table>

</body>
</html>
