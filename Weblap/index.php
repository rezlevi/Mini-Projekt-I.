<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <?php
    session_start();
        if(!isset($_SESSION['id']))
        {
            header('Location: login_form.php');
        }
        
        require 'mydbms.php';
        $query = "SELECT * FROM users WHERE id=".$_SESSION['id'];
        $results=mysqli_query($con, $query) or die ("Nem sikerült ".$query);
        $record=mysqli_fetch_row($results);

        $query2 = "SELECT * FROM statistics WHERE user_id=".$_SESSION['id'];
        $results2=mysqli_query($con, $query2) or die ("Nem sikerült ".$query);
        $record2=mysqli_fetch_row($results2);
    ?>
                    
    <h1 align="center">Profilom</h1>
    <h3 align="center">Itt láthatod a megadott adataidat, illetve módositani tudod az adataidat, ha szükséges.</h3>
    <form action="update.php" method="POST">
        <table align = "center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" placeholder="Username" value="<?= $record[1] ?> " required/></td>
            </tr>
            <tr>
                <td>E-mail:</td>
                <td><input type="email" name="email" placeholder="mintamarton@email.com" value="<?= $record[2] ?> " required/></td>
            </tr>
            <tr>
                <td>Jelszó:</td>
                <td><input type="password" name="jelszo" placeholder="****" required/></td>
            </tr>
            <tr>
                <td><button type="submit">Módosítás</button></td>
                <td><button type="reset">Adatok visszaállítása</button></td>
            </tr>
            <tr>
                <td>
                    </form>
                        <form action="delete_profil.php" method="POST">
                        <input type="hidden" name="id" value=""/> 
                        <button type="submit">Profil Törlése</button>
                    </form>
                </td>
            </tr>
        </table>
    </form>



    <?php echo "<br>"?>

<h3 align = "center">Itt láthatod az eddigi játékaid statisztikáit:</h3>
<table align = "center"  style="background-color: white; border: 1px solid;">
    <tr>
        <th class="t">Összes</th>
        <th class="t">Nyert</th>
        <th class="t">Vesztett</th>
        <th class="t">Döntetlen</th>
        <th class="t">Győzelmi százalék</th>
    </tr>
    <tr>
        <td class="t"><?= $record2[2] ?></td>
        <td class="t"><?= $record2[3] ?></td>
        <td class="t"><?= $record2[4] ?></td>
        <td class="t"><?= $record2[5] ?></td>
        <td class="t"><?= $record2[6] ?></td>
    </tr>
</table>
    <?php echo "<br>"?>
    <form align = "center" action="gamemode_select.php">
    <input type="submit" value="Irány játszani" />
</form>
<?php echo "<br>"?>
    <form align="center" action="logout.php" method = "POST">
                    <input type="hidden" name="id"/>
                    <button type="submit">Kijelentkezés</button>
                </form>
                

    
</body>
</html>