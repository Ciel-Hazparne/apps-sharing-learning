<?php
$pageTitle = "Présentation du projet";
require_once(__DIR__ . '/partials/header.html.php');
?>

<div class="container mt-4" xmlns="http://www.w3.org/1999/html">
    <h1> Apps Sharing</h1>
    <p class="lead">Site de partage d'applications web construit en PHP procédural.</p>

    <h2> Fonctionnalités</h2>
    <ul>
        <li>Création de compte / Connexion</li>
        <li>Ajout, modification, suppression d'applications avec fichier ZIP</li>
        <li>Commentaires par application</li>
        <li>Téléchargement de fichiers</li>
        <li>Profil utilisateur : affichage, modification, suppression</li>
    </ul>

    <h2> Structure</h2>
    <pre><code>apps-sharing/
    ├── apps/
    ├── comments/
    ├── inc/
    ├── partials/
    ├── security/
    ├── files/
    ├── index.php
    └── database.sql</code></pre>

    <h2> Technologies utilisées</h2>
    <ul>
        <li>PHP 8.4 (procédural)</li>
        <li>MySQL 8.0.42-0ubuntu0.24.04.1</li>
        <li>Bootstrap 5</li>
        <li>FontAwesome</li>
        <li>IDE PhpStorm gratuit pour les étudiants</li>
    </ul>

    <h2> Installation</h2>
    <ol>
        <li>Cloner le projet</li>
        <li>Importer <code>apps_sharing.sql</code> dans MySQL</li>
        <li>Configurer la connexion dans <code>inc/db_connect.php</code></li>
        <li>Lancer votre serveur local <small><em>(php -S 127.0.0.1:8000 par ex. depuis le terminal PhpStorm)</em></small>
            et accéder à <code>/index.php</code></li>
    </ol>

    <h2> Compte test</h2>
    <ul>
        <li>Email : <code>tciel.ir1@ciel-ir.eh</code></li>
        <li>Mot de passe : <code>ciel-ir1</code></li>
    </ul>

    <h2> Améliorations </h2>
    Pour un projet plus avancé il serait intéressant de prévoir les fonctionnalités suivantes :
    <ul>
        <li>Hashage des mots de passe</li>
        <li>Pagination, recherche</li>
        <li>Rôles utilisateurs</li>
        <li>Validation JS côté client</li>
        <li>Messages et pages d'erreurs</li>
    </ul>

    <p class="mt-4"><em>
            Corrigé du projet pédagogique "apps-sharing-learning" de découverte de PHP-MySQL pour débutant en
            PHP mais ayant des connaissances en POO (C++). Ce projet incomplet, sera suivi d'un autre en MVC pour finir
            sur un projet Symfony. Symfony est utilisé, lors du projet comptant pour l'épreuve E6 (150h coeff 6), pour
            réaliser des interface de gestion des systèmes (qualité de l'air, plantxa connectée, accès automatisé, pluvio...
        </em></p>
</div>

<?php require_once(__DIR__ . '/partials/footer.html.php'); ?>
