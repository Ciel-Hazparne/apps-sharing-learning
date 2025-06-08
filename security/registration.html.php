<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');
$pageTitle = "Créer un compte";
require_once(__DIR__ . '/../partials/header.html.php');
?>

<h2 class="mb-4">Créer un compte</h2>

<?php if (!empty($_SESSION['registration_error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['registration_error']; unset($_SESSION['registration_error']); ?></div>
<?php endif; ?>

<form method="post" action="registration.php">
    <div class="mb-3">
        <label for="full_name" class="form-label">Nom et prénom</label>
        <input type="text" name="full_name" id="full_name" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Age</label>
        <input type="number" name="age" id="age" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" name="email" id="email" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" name="password" id="password" required class="form-control">
    </div>
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirmez le mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" required class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Créer mon compte</button>
</form>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
