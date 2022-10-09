<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>
<body>
    
</body>
</html>



<?php
    session_start();
    if(!isset($_SESSION['id']))
    {
        header('Location: login_form.php');
    }
    require 'mydbms.php';
    $query = "SELECT * FROM users WHERE id=".$_SESSION['id'];
    $results=mysqli_query($con, $query) or die ("Nem sikerült ".$query);
    $record=mysqli_fetch_row($results)

    
    
?>
<?php
var_dump($record);

$int = (int)$record;

if ($int = 1)
{
    echo "Admin vagy!";
}
else
{
    echo "Nope";
}

?>