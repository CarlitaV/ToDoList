<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes Tâches</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <h1>Bienvenue <?= htmlspecialchars($_SESSION['utilisateur']['nom']); ?></h1>

    <h2>Mes Tâches</h2>
    <form id="taskForm" action="index.php?action=createTask" method="POST" >
        <input type="text" name="titre" placeholder="Titre" required>
        <textarea name="description" placeholder="Description" id="description"></textarea>
        <button type="submit">Ajouter une tâche</button>
    </form>
    <div id="message"></div>

    <?php foreach($taches as $tache): ?>
        <div class="task">

            <h3><?= htmlspecialchars($tache['titre']); ?></h3>
            <p><?= htmlspecialchars($tache['description']); ?></p>

            <small class="status" <?= $tache['statut']; ?>
                <?= htmlspecialchars($tache['statut']); ?>
            </small>

            <button class="delete-btn" data-id="<?= $tache['id']; ?>">
                Supprimer
            </button>

            <select class="status-select" data-id="<?= $tache['id']; ?>">
                <option value="a_faire" <?= $tache['statut']=='a_faire'?'selected':''; ?>>A faire</option>
                <option value="en_cours" <?= $tache['statut']=='en_cours'?'selected':''; ?>>En cours</option>
                <option value="termine" <?= $tache['statut']=='termine'?'selected':''; ?>>Terminé</option>
            </select>
        </div>
    <?php endforeach; ?>
            
    <p>Nombre de tâches : <?= $nbTaches ?></p>
        
    
<script src="js/script.js"></script>
</body>
</html>