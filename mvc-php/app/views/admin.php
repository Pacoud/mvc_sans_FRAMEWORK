<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#071028',
                        'primary-foreground': '#E6EEF8',
                        accent: '#6b0f0f'
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-primary min-h-screen text-primary-foreground">
    <div class="max-w-5xl mx-auto px-4 py-8">
        <header class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-semibold">Administration</h1>
                <p class="text-sm text-primary-foreground/80 mt-1">Gestion des utilisateurs</p>
            </div>
            <div>
                <a href="/" class="text-sm px-4 py-2 rounded-md bg-white/10 hover:bg-white/20">Retour aux tâches</a>
                <a href="/logout" class="text-sm px-4 py-2 rounded-md bg-accent text-white hover:opacity-90 ml-2">Déconnexion</a>
            </div>
        </header>

        <main>
            <div class="bg-white/5 rounded-lg shadow-sm overflow-hidden">
                <table class="w-full text-sm text-left">
                    <thead class="bg-white/10">
                        <tr>
                            <th scope="col" class="px-6 py-3">ID</th>
                            <th scope="col" class="px-6 py-3">Nom d'utilisateur</th>
                            <th scope="col" class="px-6 py-3">Rôle</th>
                            <th scope="col" class="px-6 py-3">Inscrit le</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr class="border-b border-white/10">
                                <td class="px-6 py-4"><?php echo $user['id']; ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($user['username']); ?></td>
                                <td class="px-6 py-4"><?php echo htmlspecialchars($user['role']); ?></td>
                                <td class="px-6 py-4"><?php echo date('d/m/Y', strtotime($user['created_at'])); ?></td>
                                <td class="px-6 py-4">
                                    <?php if ($user['id'] != $_SESSION['user_id']): ?>
                                        <a href="/admin/delete?id=<?php echo $user['id']; ?>" class="text-red-400 hover:underline" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">Supprimer</a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
