<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');

if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('../index.php');
}

$pdo = getPDO();
$currentEmail = $_SESSION['LOGGED_USER']['email'];
$user = getUserByEmail($pdo, $currentEmail);
$userId = $_SESSION['LOGGED_USER']['user_id'];

if (!empty($_POST['delete'])) {
    deleteUserByEmail($pdo, $currentEmail);
    session_destroy();
    redirectToUrl('../index.php');
}

if (!empty($_POST['update'])) {
    $full_name = trim($_POST['full_name']);
    $age = (int) $_POST['age'];
    $email = trim($_POST['email']);
    $newPassword = $_POST['password'];
    $passwordConfirm = $_POST['password_confirm'] ?? '';

    if (empty($full_name) || empty($age) || empty($email)) {
        $_SESSION['profile_error'] = "Tous les champs sauf le mot de passe sont requis.";
        redirectToUrl('profile.html.php');
    }

    if (!empty($newPassword)) {
        if ($newPassword !== $passwordConfirm) {
            $_SESSION['profile_error'] = "Les mots de passe ne correspondent pas.";
            redirectToUrl('profile.html.php');
        }
        $password = $newPassword; // mot de passe non hashé, comme souhaité
    } else {
        $password = null;
    }

    try {
        updateUser($pdo, $userId, $full_name, $age, $email, $password);
        $_SESSION['LOGGED_USER']['email'] = $email;
        $_SESSION['profile_success'] = "Profil mis à jour avec succès.";
    } catch (Exception $e) {
        $_SESSION['profile_error'] = "Erreur lors de la mise à jour : " . $e->getMessage();
    }

    redirectToUrl('profile.html.php');
}
