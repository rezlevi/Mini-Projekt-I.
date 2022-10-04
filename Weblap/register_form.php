<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Regisztráció</title>

</head>
<body>
    <form action="register.php" method="POST" >
        <table>
            <tr>
                <td>Username:</td>
                <td><input type="text" name="username" placeholder="username" required /></td>
            </tr>
            <tr>
                <td>E-mail*:</td>
                <td><input type="email" name="email" placeholder="gipszjakab@email.com" required /></td>
            </tr>
            <tr>
                <td>Jelszó*:</td>
                <td><input type="password" name="jelszo" placeholder="jelszavam546" required /></td>
            </tr>
            <tr>
                <td><button type="submit">Regisztrálok</button></td>
                <td><button type="reset">Adatok törlése</button></td>
            </tr>
        </table>
    </form>
</body>
</html>