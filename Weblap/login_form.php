<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
</head>
<body>
    <form action="login.php" method="POST">
        <table>
            <tr>
                <td>Username: </td>
                <td><input type="text" name="username" /></td>
            </tr>
            <tr>
                <td>Jelszó: </td>
                <td><input type="password" name="jelszo" /></td>
            </tr>
            <tr>
                <td></td>
                <td><button type="submit">Bejelentkezés</button></td>
            </tr>
        </table>
    </form>
    <a href="register_form.php">Regisztráció</a>
</body>
</html>