<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
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
<body class="bg-primary min-h-screen flex items-center justify-center">
    <div class="w-full max-w-md p-8 space-y-6 bg-white/5 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold text-center text-primary-foreground">Inscription</h1>
        <?php if (isset($_GET['error'])): ?>
            <p class="text-red-400 text-center">
                <?php if ($_GET['error'] == 1) echo "Ce nom d'utilisateur est déjà pris."; ?>
                <?php if ($_GET['error'] == 2) echo "Une erreur est survenue lors de l'inscription."; ?>
            </p>
        <?php endif; ?>
        <form method="POST" action="/register" class="space-y-6">
            <div>
                <label for="username" class="text-sm font-medium text-primary-foreground">Nom d'utilisateur</label>
                <input id="username" name="username" type="text" required class="w-full px-3 py-2 mt-1 bg-white/10 rounded-md placeholder:text-primary-foreground/60 focus:outline-none focus:ring-2 focus:ring-primary-foreground/20">
            </div>
            <div>
                <label for="password" class="text-sm font-medium text-primary-foreground">Mot de passe</label>
                <input id="password" name="password" type="password" required class="w-full px-3 py-2 mt-1 bg-white/10 rounded-md placeholder:text-primary-foreground/60 focus:outline-none focus:ring-2 focus:ring-primary-foreground/20">
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-accent text-white rounded-md hover:bg-[#581010]">S'inscrire</button>
        </form>
        <p class="text-sm text-center text-primary-foreground/70">
            Déjà un compte ? <a href="/login" class="font-medium text-accent hover:underline">Connectez-vous</a>
        </p>
    </div>
</body>
</html>
