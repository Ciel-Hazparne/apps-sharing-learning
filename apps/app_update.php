<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');

if (
    empty($_POST['id']) || !is_numeric($_POST['id']) ||
    empty($_POST['name']) ||
    empty($_POST['description']) ||
    trim(strip_tags($_POST['name'])) === '' ||
    trim(strip_tags($_POST['description'])) === ''
) {
    echo "Tous les champs sont obligatoires.";
    return;
}

$id = (int)$_POST['id'];
$name = trim(strip_tags($_POST['name']));
$description = trim(strip_tags($_POST['description']));
$creator = $_SESSION['LOGGED_USER']['email'] ?? 'unknown';

$pdo = getPDO();

// Récupération du fichier existant
$app = retrieveApp($pdo, $id);
$oldFile = $app['file'] ?? null;
$fileName = $oldFile;

// Si un nouveau fichier est uploadé
if (
    isset($_FILES['file']) &&
    $_FILES['file']['error'] === UPLOAD_ERR_OK
) {
    $fileTmpPath = $_FILES['file']['tmp_name'];
    $originalName = basename($_FILES['file']['name']);
    $fileExtension = strtolower(pathinfo($originalName, PATHINFO_EXTENSION));

    if ($fileExtension !== 'zip') {
        echo "Le fichier doit être au format ZIP.";
        return;
    }

    // Supprime l'ancien fichier
    if ($oldFile && file_exists(__DIR__ . '/../files/' . $oldFile)) {
        unlink(__DIR__ . '/../files/' . $oldFile);
    }

    // Nouveau nom
    $fileName = uniqid('app_', true) . '.zip';
    $destPath = __DIR__ . '/../files/' . $fileName;
    move_uploaded_file($fileTmpPath, $destPath);
}

// Mise à jour en base
$success = updateApp($pdo, $id, $name, $description, $creator, $fileName);

require_once(__DIR__ . '/../partials/header.html.php');
?>

<div>
    <?php if ($success) : ?>
        <h1>Appli mise à jour avec succès</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
                <p class="card-text"><?= nl2br(htmlspecialchars($description)) ?></p>
                <p class="card-text"><b>Auteur :</b> <?= htmlspecialchars($creator) ?></p>
                <p class="card-text"><b>Fichier :</b> <?= htmlspecialchars($fileName) ?></p>
                <a class="btn btn-dark mt-3" href="/index.php"><i class="fa fa-reply"></i> Retour</a>
        </div>
    <?php else : ?>
        <div class="alert alert-danger" role="alert">
            Une erreur est survenue lors de la mise à jour.
        </div>
    <?php endif; ?>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
