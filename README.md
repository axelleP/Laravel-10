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
- créer un controleur : `php artisan make:controller ArticleController`
- créer un modèle : 
   - `php artisan make:model Article`
   - avec une migration : `php artisan make:model Article --migration`
- quand on modifie des routes : `php artisan route:cache` et `php artisan route:clear`
- exécuter les migrations : 
   - toutes : `php artisan migrate`
   - 1 seule : `php artisan migrate --path=database\migrations\2024_02_03_153848_create_articles_table.php`
- annuler les migrations :
   - toutes : `php artisan migrate:rollback`
   - 1 seule : `php artisan migrate:rollback --path=database\migrations\2024_02_03_153848_create_articles_table.php` 