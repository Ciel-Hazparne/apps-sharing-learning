
Apps Sharing

Site de partage d'applications web construit en PHP procédural.
Fonctionnalités

    Création de compte / Connexion
    Ajout, modification, suppression d'applications avec fichier ZIP
    Commentaires par application
    Téléchargement de fichiers
    Profil utilisateur : affichage, modification, suppression

Structure

apps-sharing/
    ├── apps/
    ├── comments/
    ├── inc/
    ├── partials/
    ├── security/
    ├── files/
    ├── index.php
    └── database.sql

Technologies utilisées

    PHP 8.4 (procédural)
    MySQL 8.0.42-0ubuntu0.24.04.1
    Bootstrap 5
    FontAwesome
    IDE PhpStorm gratuit pour les étudiants

Installation

    Cloner le projet
    Importer apps_sharing.sql dans MySQL
    Configurer la connexion dans inc/db_connect.php
    Lancer votre serveur local (php -S 127.0.0.1:8000 par ex. depuis le terminal PhpStorm) et accéder à /index.php

Compte test

    Email : tciel.ir1@ciel-ir.eh
    Mot de passe : ciel-ir1

Améliorations
Pour un projet plus avancé il serait intéressant de prévoir les fonctionnalités suivantes :

    Hashage des mots de passe
    Pagination, recherche
    Rôles utilisateurs
    Validation JS côté client
    Messages et pages d'erreurs

Corrigé du projet pédagogique "apps-sharing-learning" de découverte de PHP-MySQL pour débutant en PHP mais ayant des connaissances en POO (C++). Ce projet incomplet, sera suivi d'un autre en MVC pour finir sur un projet Symfony. Symfony est utilisé, lors du projet comptant pour l'épreuve E6 (150h coeff 6), pour réaliser des interface de gestion des systèmes (qualité de l'air, plantxa connectée, accès automatisé, pluvio...
