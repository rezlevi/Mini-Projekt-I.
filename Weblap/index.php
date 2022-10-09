<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Főoldal</title>
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
    <h1>Profilom</h1>
    <h3>Itt láthatod a megadott adataidat, illetve módositani tudod az adataidat, ha szükséges.</h3>
    <form action="update.php" method="POST">
        <table>
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
                <td><input type="password" name="jelszo" required/></td>
            </tr>
            <tr>
                <td><button type="submit">Módosítás</button></td>
                <td><button type="reset">Adatok visszaállítása</button></td>
            </tr>
        </table>
    </form>

   



    <table>
        <tr>
            <td>
                <form action="logout.php" method = "POST">
                    <input type="hidden" name="id"/>
                    <button type="submit">Kijelentkezés</button>
                </form>
            </td>
            <td>
                </form>
                    <form action="delete_profil.php" method="POST">
                    <input type="hidden" name="id" value=""/> 
                    <button type="submit">Profil Törlése</button>
                </form>
            </td>
        </tr>
    </table>




    <?php echo "<br>"?>

<h3>Itt láthatod az eddigi játékaid statisztikáit:</h3>
<table>
    <tr>
        <th>Összes</th>
        <th>Nyert</th>
        <th>Vesztett</th>
        <th>Döntetlen</th>
        <th>Győzelmi százalék</th>
    </tr>
    <tr>
        <td><?= $record2[2] ?></td>
        <td><?= $record2[3] ?></td>
        <td><?= $record2[4] ?></td>
        <td><?= $record2[5] ?></td>
        <td><?= $record2[6] ?></td>
    </tr>
</table>
    
<form action="gamemode_select.php">
    <input type="submit" value="Irány játszani" />
</form>
    
</body>
</html>