
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Tâches</title>
    <!-- Tailwind CDN pour prototype rapide. Pour production, voir README_tailwind.md pour build local -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        // Couleurs personnalisées : bleu très sombre principal et rouge sombre secondaire
                        primary: '#071028',        // bleu très sombre
                        'primary-foreground': '#E6EEF8',
                        accent: '#6b0f0f'          // rouge sombre
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-primary min-h-screen text-primary-foreground">
    <div class="max-w-3xl mx-auto px-4 py-8">
        <header class="mb-8">
            <h1 class="text-3xl font-semibold">Liste des Tâches</h1>
            <p class="text-sm text-primary-foreground/80 mt-1">Gestion simple des tâches — stylée avec Tailwind CSS</p>
        </header>

        <main>
            <section class="bg-white/5 rounded-lg shadow-sm p-6 mb-6">
                <ul class="space-y-3">
                    <?php if (!empty($tasks)): ?>
                        <?php foreach ($tasks as $task): ?>
                            <li class="flex items-center justify-between bg-white/2 rounded-md p-3">
                                <span class="break-words"><?php echo htmlspecialchars($task['name'], ENT_QUOTES, 'UTF-8'); ?></span>
                                <div class="flex items-center gap-2">
                                    <a href="/delete?id=<?php echo $task['id']; ?>" class="text-sm px-3 py-1 rounded-md bg-accent text-white hover:opacity-90">Supprimer</a>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <li class="text-sm text-primary-foreground/70">Aucune tâche pour le moment.</li>
                    <?php endif; ?>
                </ul>
            </section>

            <section class="bg-white/5 rounded-lg shadow-sm p-6">
                <form method="POST" action="/add" class="flex gap-3">
                    <label for="taskName" class="sr-only">Nouvelle tâche</label>
                    <input id="taskName" name="taskName" type="text" placeholder="Nouvelle tâche" required
                           class="flex-1 px-3 py-2 rounded-md bg-white/10 placeholder:text-primary-foreground/60 focus:outline-none focus:ring-2 focus:ring-primary-foreground/20" />
                    <button type="submit" class="px-4 py-2 rounded-md bg-accent text-white hover:bg-[#581010]">Ajouter</button>
                </form>
            </section>
        </main>

        <footer class="mt-8 text-xs text-primary-foreground/60">Prototype — Tailwind via CDN. Voir README pour build local.</footer>
    </div>
</body>
</html>