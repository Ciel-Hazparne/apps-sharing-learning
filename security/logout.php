<?php
session_start(); // On démarre la session pour pouvoir la détruire

require_once(__DIR__ . '/../inc/functions.php');

// Vider toutes les variables de session
$_SESSION = [];

// Supprimer le cookie de session, si présent
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000, // dans le passé
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

// Détruire la session sur le serveur
session_destroy();

// Redirection
redirectToUrl('login.html.php');
