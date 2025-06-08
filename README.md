# Apps Sharing learning
### Site de partage d'applications web construit en PHP procédural.

---
## Fonctionnalités

- Création de compte / Connexion
- Ajout, modification, suppression d'applications avec fichier ZIP
- Commentaires par application
- Téléchargement de fichiers
- Profil utilisateur : affichage, modification, suppression

---

## Structure du projet


```
apps-sharing/
    ├── apps/
    ├── comments/
    ├── files/
    ├── images/
    ├── inc/
    ├── pages/
    ├── partials/
    ├── security/
    ├── users/
    └── index.php
```

## Technologies utilisées
- PHP 8.3 (procédural)
- MySQL 8.0.42-0ubuntu0.24.04.1
- Bootstrap 5
- FontAwesome
- IDE PhpStorm (*gratuit pour les étudiants*)

---

## Installation

1. Cloner le projet git clone https://github.com/Ciel-Hazparne/apps-sharing-learning.git
2. Importer apps_sharing.sql dans MySQL
3. Configurer la connexion dans inc/db_connect.php
4. Lancer votre serveur local *(php -S 127.0.0.1:8000 par ex. depuis le terminal PhpStorm)* et accéder à /index.php

---

## Travail à faire
Finaliser les fichiers suivants :
- home.php
- app_create.php
- app_delete.php
- app_show.php
- db_apps_requests.php