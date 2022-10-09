<?php
session_start();

if(isset($_POST["jatekmod_gomb"])){
    if($_POST["jatekmod"] =="Bo1"){
        $_SESSION['jatekszam'] = 1;
        $_SESSION['maxpont'] = 1;
    }
    elseif($_POST["jatekmod"] =="Bo3"){
        $_SESSION['jatekszam'] = 3;
        $_SESSION['maxpont'] = 2;
    }
    else{
        $_SESSION['jatekszam'] = 5;
        $_SESSION['maxpont'] = 3;
    }
    $_SESSION['jelenlegivalasztas'] = 0;
    $_SESSION['jatekospontja'] = 0;
    $_SESSION['botpontja'] = 0;
    $_SESSION['dontetlen'] = 0;
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
<form align="center" action="game2.php" method="post">

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
<?php echo "<br>"?>
<form align="center" action="index.php">
    <input type="submit" value="Vissza" />
    </form>


</body>
</html>

