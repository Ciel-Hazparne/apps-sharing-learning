<?php
require_once(__DIR__ . '/../partials/header.html.php');
$pageTitle = "login";
?>
<!-- Si utilisateur/trice est non identifié(e), on affiche le formulaire -->
<?php if (!isset($_SESSION['LOGGED_USER'])) : ?>
    <form action="login.php" method="POST">
        <!-- si message d'erreur on l'affiche -->
        <?php if (isset($_SESSION['LOGIN_ERROR_MESSAGE'])) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $_SESSION['LOGIN_ERROR_MESSAGE'];
                unset($_SESSION['LOGIN_ERROR_MESSAGE']); ?>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="L'email de votre compte">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Connexion</button>
    </form>
    <!-- Si l'utilisateur n'a pas de ompte -->
    <p class="mt-3">
        <a href="registration.html.php">Créez votre compte</a>
    </p>

    <!-- Si l'utilisateur est bien connectée on affiche un message de succès -->
<?php else : ?>
    <div class="alert alert-success" role="alert">
        Bonjour <?= $_SESSION['LOGGED_USER']['email']; ?> et bienvenue sur le site !
    </div>
<?php endif; ?>