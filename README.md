
## Arcadia

Arcadia est un zoo situé en France près de la forêt de Brocéliande, en bretagne depuis 1960. Ils possèdent tout un panel d’animaux, réparti par habitat (savane, jungle, marais) et font extrêmement attention à leurs santés. Chaque jour, plusieurs vétérinaires viennent afin d’effectuer les contrôles sur chaque animal avant l’ouverture du zoo afin de s’assurer que tout se passe bien, de même, toute la nourriture donnée est calculée afin d’avoir le bon grammage (le bon grammage est précisé dans le rapport du vétérinaire).
## Fonctionnalités

- **Laravel** : Un framework PHP robuste pour la construction d'applications web évolutives.
- **Tailwind CSS** : Un framework CSS "utility-first" pour la conception d'interfaces personnalisées et réactives.
- **Blade** : Est un outil puissant et flexible pour la gestion des vues dans une application Laravel, conçu pour améliorer la productivité et la maintenabilité du code.
- **laravel-vite-plugin** : Plugin Laravel Mix pour Vite, permettant un regroupement JavaScript plus rapide et des outils modernes.
- **Flowbite** : Une collection de composants Tailwind CSS pour accélérer le développement de l'interface utilisateur.

## Pour Commencer

1. **Cloner le Dépôt** :
   ```bash
   git clone (https://github.com/RAMMACHyc/Arcadia_Zoo.git)
   ```

2. **Installer les Dépendances** :
   ```bash
   composer install
   npm install
   ```

3. **Configurer l'Environnement** :
   - Dupliquer `.env.example` et le renommer en `.env`.
   - Générer une clé d'application :
     ```bash
     php artisan key:generate
     ```

4. **Configuration de la Base de Données** :
   - Exécuter les migrations de base de données :
     ```bash
     php artisan migrate
     ```
   - Alimenter la base de données avec des données par défaut :
     ```bash
     php artisan db:seed --class=RolesTableSeeder
     php artisan db:seed --class=AdminTableSeeder
     ```

5. **Démarrer le Serveur de Développement** :
   ```bash
   npm run dev
   ```

6. **Accéder à Votre Application** :
   Rendez-vous sur `http://localhost:3000` dans votre navigateur web.

## Utilisation

- **Mode Développement** : Lancez le serveur de développement avec `npm run dev`. Cette commande compile vos ressources et démarre un serveur de développement.
- **Construction en Production** : Créez une version prête pour la production avec `npm run build`.

## Contribuer

Les contributions sont les bienvenues ! Si vous souhaitez contribuer à ce projet, veuillez suivre ces directives :
- Forker le dépôt.
- Créer votre branche de fonctionnalité : `git checkout -b nom-de-la-fonctionnalité`.
- Effectuer vos modifications : `git commit -m 'Ajouter une fonctionnalité'`.
- Pousser vers la branche : `git push origin nom-de-la-fonctionnalité`.
- Soumettre une pull request.


## Remerciements

- Merci à la communauté Laravel pour avoir construit un framework incroyable.
- Tailwind CSS pour avoir révolutionné le développement frontend.
- Un merci spécial à tous les contributeurs et mainteneurs des bibliothèques et outils utilisés dans ce projet.

## Contact

Pour toute question ou suggestion, n'hésitez pas à contacter [Sedik Rammach](mailto:rammachsedik@gmail.com.fr).
