<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistiques</title>
</head>
<body>
    <?php
session_start();

if(!isset($_SESSION['user'])) {
    header("Location: login.php");
}
?>

<h1>Bienvenue 
<?php echo $_SESSION['user']['nom']; ?></h1>
    
</body>
</html>