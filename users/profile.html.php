<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');
$pageTitle = "Mon profil";

if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('../index.php');
}

$pdo = getPDO();
$user = getUserByEmail($pdo, $_SESSION['LOGGED_USER']['email']);
require_once(__DIR__ . '/../partials/header.html.php');
?>

<h2 class="mb-4">Mon profil</h2>

<?php if (!empty($_SESSION['profile_success'])): ?>
    <div class="alert alert-success"><?= $_SESSION['profile_success']; unset($_SESSION['profile_success']); ?></div>
<?php endif; ?>
<?php if (!empty($_SESSION['profile_error'])): ?>
    <div class="alert alert-danger"><?= $_SESSION['profile_error']; unset($_SESSION['profile_error']); ?></div>
<?php endif; ?>

<form method="post" action="profile.php">
    <div class="mb-3">
        <label for="full_name" class="form-label">Nom et prénom</label>
        <input type="text" name="full_name" id="full_name" required class="form-control" value="<?= htmlspecialchars($user['full_name']) ?>">
    </div>
    <div class="mb-3">
        <label for="age" class="form-label">Âge</label>
        <input type="number" name="age" id="age" required class="form-control" value="<?= htmlspecialchars($user['age']) ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse email</label>
        <input type="email" name="email" id="email" required class="form-control" value="<?= htmlspecialchars($user['email']) ?>">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Nouveau mot de passe (laisser vide si inchangé)</label>
        <input type="password" name="password" id="password" class="form-control">
    </div>
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirmez le mot de passe</label>
        <input type="password" name="password_confirm" id="password_confirm" class="form-control">
    </div>

    <button type="submit" name="update" value="1" class="btn btn-success"><i class="fa fa-check"></i> Mettre à jour</button>
    <button type="submit" name="delete" value="1" class="btn btn-danger"
            onclick="return confirm('Voulez-vous vraiment supprimer votre compte ? Cette action est irréversible.')">
        <i class="fa fa-trash-o"></i> Supprimer mon compte</button>
</form>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>