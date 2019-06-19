# laravel_project

 Installer Laradock

1/
- se placer dans le dossier Laradock
- lancer : cp env-example .env
- utiliser la commande "sudo nano nginx/sites/defaut.conf"
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

Dans le .env de laravel changer les informations de connexion à la BDD comme suit: 
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=test
DB_USERNAME=root
DB_PASSWORD=root

!!! Si quelqu'un modifie des infos, prevenir les autres !!! 

Pour se connecter à la BDD : localhost:8080 
mysql/ root/ root

Pour créer et remplir la BDD:
- créer la base 'test' manuellement 
- php artisan migrate
- dans docker workspace 'php artisan db:seed'
 
 
COMPOSER: 

/!\ Eviter de faire un composer update !! si c'est le cas, prevenir l'equipe!! /!\

Si un membre du groupe fait un 'composer update' d'un package ou des tous les packages,
tous les autres membres, une fois le pull fait, lancer un 'composer install' pour recuperer exactement les memes versions de packages 


LARAVEL: 

Creation Modele AddFriend
php artisan make:model AddFriend



