# <h1 align="center">👨‍💻 Entraînement Laravel 10 👩‍💻</h1>

Documentation : https://laravel.com/docs/10.x/     

## 1) Lancement
Lancer WampServer avec PHP à partir de la version 8.1.     

Urls accessibles :       
- soit celle donnée par l'exécution de la commande `php artisan serve` : http://127.0.0.1:8000/
- soit celle que l'on a configuré en vhost : http://laravel-10-training/

## 2) Configuration
- /config
- .env
- `composer install` : Composer doit d'abord être installé
- `npm install` : Node.js et npm doivent d'abord être installés

### Attention
Si on utilise pas Laravel Sanctum il faut ignorer ses migrations en ajoutant `\Laravel\Sanctum\Sanctum::ignoreMigrations();` dans la fonction register() du fichier app\Providers\AppServiceProvider.php.    

## 3) Commandes
- créer des fichiers lang : `php artisan lang:publish`
- charger les fichiers définis dans `vite.config.js` en mode dev : `npm run dev` 
- quand on modifie des routes : `php artisan route:cache` et `php artisan route:clear`
- créer un controleur : `php artisan make:controller ArticleController`
- créer un modèle : 
   - `php artisan make:model Article`
   - avec une migration : `php artisan make:model Article --migration`

### Migrations
- créer une migration : `php artisan make:migration create_articles_table`
- exécuter les migrations : 
   - toutes : `php artisan migrate`
   - 1 seule : `php artisan migrate --path=database\migrations\2024_02_03_153848_create_articles_table.php`
- annuler les migrations :
   - toutes : `php artisan migrate:rollback`
   - 1 seule : `php artisan migrate:rollback --path=database\migrations\2024_02_03_153848_create_articles_table.php`
   
### Factory
- créer une factory : `php artisan make:factory ArticleFactory`
   - pour un modèle donné : `php artisan make:factory ArticleFactory --model=Article`
- utiliser une factory : `Article::factory()->count(10)->create();`
   - soit dans un seeder : centralise la génération de données tests, permet de le faire par la console
   - soit ou on veut dans le code : plus flexible

### Seeder
- créer un seeder : `php artisan make:seeder ArticleSeeder`
- exécuter un seeder : `php artisan db:seed --class=ArticleSeeder`

## 4) Extension
- Laravel Blade Snippets de Winnie Lin
- HTML CSS Support de ecmel

## 5) Définitions
- migration : permet de sauvegarder et d'exécuter des requêtes SQL afin de maintenir la base de données à jour
- factory : permet de créer des enregistrements factices dans une table => déclanchement par le code
- seeder : permet de créer des enregistrements factices dans une table => déclenchement en ligne de commande
- vite : outil pour compiler et regrouper des fichiers CSS et JavaScript.       
Rque : on compile le code pour que le navigateur puisse l'interpreter 

## 6) Documentation
- faker : https://fakerphp.github.io/formatters/numbers-and-strings/
- helpers (fonction blade, route, ...) : https://laravel.com/docs/10.x/helpers