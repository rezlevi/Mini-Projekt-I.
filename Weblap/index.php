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

    <?php echo "<br>"?>

    <form action="logout.php" method = "POST">
        <input type="hidden" name="id"/>
        <button type="submit">Kijelentkezés</button>
    </form>
        
    
        
    
    
        <form action="delete_profil.php" method="POST">
        <input type="hidden" name="id" value=""/> 
        <button type="submit">Törlés</button>
    </form>


    

    
</body>
</html>