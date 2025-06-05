<?php
session_start();

require_once(__DIR__ . '/../inc/requires.php');

$dataApp = $_POST;

// Validation du formulaire
if (
    empty($dataApp['name']) ||
    empty($dataApp['description']) ||
    trim(strip_tags($dataApp['name'])) === '' ||
    trim(strip_tags($dataApp['description'])) === ''
) {
    echo "Il faut le nom de l'application et sa description pour soumettre le formulaire.";
    return;
}

$name = trim(strip_tags($dataApp['name']));
$description = trim(strip_tags($dataApp['description']));
$author = $_SESSION['LOGGED_USER']['email'];

// Insertion via la fonction
$pdo = getPDO(); // on instancie PDO
$createdId = createApp($pdo, $name, $description, $author);

?>

<?php require_once(__DIR__ . '/../partials/header.html.php'); ?>

<h1>Appli ajoutée avec succès !</h1>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
        <p class="card-text"><b>Email</b> : <?= htmlspecialchars($author) ?></p>
        <p class="card-text"><b>Description</b> : <?= htmlspecialchars($description) ?></p>
    </div>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
