# laravel_project

 Installer Laradock

1/
- se placer dans le dossier Laradock
- lancer : cp env-example .env
- se deplacer jusqu'a nginx/sites/defaut.conf 
- ajouter à la ligne root (ligne 13) la root suivante "/var/www/laravel_project/public;"
- lancer un docker-compose build nginx à la racine du dossier Laradock

2/
- se placer à la racine du dossier laravel_project
- lancer un 'cp .env-example .env'
- lancer un 'composer install'

3/
- puis lancer à la racine de Laradock : docker-compose up -d nginx mysql phpmyadmin workspace
- puis pour rentrer sur le workspace lancer: 
    docker-compose exec --user=www-data workspace bash
- une fois sur le workspace, se deplacer dans laravel_project et lancer : php artisan key:generate
 
Lancer localhost:80
 
