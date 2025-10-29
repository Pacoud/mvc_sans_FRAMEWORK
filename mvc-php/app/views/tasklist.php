
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
</head>
<body>
    <h1>Liste des Tâches</h1>
    <ul>
        <?php foreach ($tasks as $task): ?>
            <li><?php echo htmlspecialchars($task['name']); ?> 
                <a href="/delete?id=<?php echo $task['id']; ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="/add">
        <input type="text" name="taskName" placeholder="Nouvelle tâche">
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>