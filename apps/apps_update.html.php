<?php
session_start();

require_once(__DIR__ . '/../inc/requires.php');

$dataApp = $_GET;

if (!isset($dataApp['id']) || !is_numeric($dataApp['id'])) {
    echo "Il faut indiquer l'identifiant de l'application pour la modifier.";
    return;
}

// Insertion via la fonction
$pdo = getPDO();
$id = (int)$_GET['id'];// on instancie PDO
$app = retrieveApp($pdo, $id);
if (!$app) {
    echo "Aucune application trouvée.";
    return;
}
?>

<?php require_once(__DIR__ . '/../partials/header.html.php'); ?>

    <div>
        <h1>Mettre à jour <?= $app['name']; ?></h1>
        <form action="apps_update.php" method="POST">
            <div class="mb-3 visually-hidden">
                <label for="id" class="form-label">Identifiant de l'appli</label>
                <input type="hidden" class="form-control" id="id" name="id" value="<?= $dataApp['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nom de l'appli</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $dataApp['name']; ?>">
            </div>
            <div class="mb-3">
                <label for="app" class="form-label">Description de l'appli</label>
                <textarea class="form-control" placeholder="Fonctionnalités essentielles en quelques lignes." id="app"
                          name="app"><?= $app['app']; ?></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Mettre à jour</button>
        </form>
        <br/>
    </div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>