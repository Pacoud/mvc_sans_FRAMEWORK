# Tailwind setup (optionnel)

Si vous voulez builder Tailwind localement au lieu d'utiliser le CDN, suivez ces étapes :

1. Installer Node.js (version 16+ recommandée) puis installer les dépendances :

```bash
npm install
```

2. Générer le CSS (build pour production) :

```bash
npm run build:css
```

Ou lancer le mode développement (watch) :

```bash
npm run dev:css
```

Le CSS généré sera écrit dans `public/css/style.css`. Ensuite, vous pouvez remplacer l'inclusion CDN par :

```html
<link rel="stylesheet" href="/css/style.css">
```

3. Pour modifier les couleurs, éditez `tailwind.config.js` (les couleurs personnalisées `primary` et `accent` sont déjà définies).

Notes :
- Le dépôt contient déjà un prototype utilisant le CDN (rapide pour le développement). Le build local est plus adapté pour la production.
