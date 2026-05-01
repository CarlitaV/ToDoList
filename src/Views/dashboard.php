<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Statistiques</title>
</head>
<body>

    <?php
    if(!isset($_SESSION['utilisateur'])) {
        header("Location: index.php?action=login");
        exit;
    }

    // Lire le JSON
    $data = json_decode(file_get_contents(__DIR__ . '/../../data/stat.json'), true);
    ?>

    <h1>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['nom']); ?></h1>

    <h2>Statistiques</h2>

    <p>Total tâches créées : <?= $data['total_tasks_created']; ?></p>
    <p>Dernier nettoyage : <?= $data['last_cleanup']; ?></p>
    <p>Top utilisateur ID : <?= $data['top_user_id']; ?></p>

    <br>

    <a href="index.php?action=tasks">Voir mes tâches</a>
    <a href="index.php?action=logout">Se déconnecter</a>

</body>
</html>
