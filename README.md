# To Do List (MVC PHP)
Application web & mobile ToDoList responsive, PHP, MySQL, DOCKER, NoSQL. Architecture MVS permmet de gerer les taches.

# Techonologie & outils utiliser
 - PHP
 - MYSQL
 - DOCKER & Docker compose
 - phpmyadmin
 - Composer pour les dependances PHP
 - NoSQL (les statistiques son stockées dans un fichier JSON simulant une approche NoSQL des données non relationnelles) data/stat.json.
    - Dashboard qui affiche :
      - Nombre totale de taches
      - Dernier nettoyage
      - Uitlisateur le plus actif
      
 - JavaScript(fetch API)
   -Ajouter une tache sans recharger la page
   - Supprimemr une tache dynamiquement
   - Modifier le statut en temps reel

# Installation & setup
 - GitHub 
 - Configurer le fichier .env
 -Lancer le serveur PHP
 - Installation des dependance (composer)
   *docker exec -it todolist-php-1 composer install
 - lancer Docker
   *docker-compose up -d -build
 - Accéder au site et à phpMyAdmin
   *http://localhost:8081
   *http://localhost:8080

# Arborésance de mon projet
public/
data/
    stat.json
sql/
src/
    Config/
    Controllers/
    Models/
    Routes/
    Services/
    Views/
.env
vendor
.gitignore
composer.json
docker-compose.yml 
dockerfile

# Architecture MVC
 - Model -> accès base de bonnées
 - Service -> logique metier
 - Controller -> gestion des requetes HTTP
 - View -> affichage HTML

# Securité
 - Mots de passe hashés (password_hash)
 - Verification securisée (password_verify)
 - Protection XSS (htmlspecialchars)
 - Requetes preparées PDO (anti SQL injection)

# Interface Utilisateur
 Interface simple et responsive
 cartes pour les taches
 statut colorés 
  - a faire
  - en cours 
  - terminé

# Ameliorations 
 - Drag & Drop des taches
 - Notifications 
 - fonctionnalité rechercher tache
 - mode sombre pour plus accessibilité
 - Rechargement dynamique compler sans refesh
 - ajouter un pied de page, logo
 - refactoriser mon code pour inclure un header et footer une fois avitant la repetition de mon code

# Ressources en lien avec mon projet
 - Figma
 - Draio
