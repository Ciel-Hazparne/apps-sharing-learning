<?php
session_start();

require_once(__DIR__ . '/../inc/requires.php');

// Vérification des données POST
if (
    empty($_POST['id']) || !is_numeric($_POST['id']) ||
    empty($_POST['name']) ||
    empty($_POST['app']) ||
    trim(strip_tags($_POST['name'])) === '' ||
    trim(strip_tags($_POST['app'])) === ''
) {
    echo "Tous les champs sont obligatoires.";
    return;
}

$id = (int) $_POST['id'];
$name = trim(strip_tags($_POST['name']));
$description = trim(strip_tags($_POST['app']));
$author = $_SESSION['LOGGED_USER']['email'] ?? 'unknown'; // Par sécurité

// Mise à jour en base
$pdo = getPDO();
$success = updateApp($pdo, $id, $name, $description, $author, true);

// Affichage résultat
require_once(__DIR__ . '/../partials/header.html.php');
?>

<div>
    <?php if ($success) : ?>
        <h1>Application mise à jour avec succès</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($description)) ?></p>
                <p class="card-text"><b>Auteur :</b> <?= htmlspecialchars($author) ?></p>
                <a class="btn btn-primary mt-3" href="/index.php">Retour à l’accueil</a>
            </div>
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            Une erreur est survenue lors de la mise à jour.
        </div>
    <?php endif; ?>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
