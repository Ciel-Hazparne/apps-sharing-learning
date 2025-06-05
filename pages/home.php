<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');

if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('../index.php');
}

$pdo = getPDO();
$apps = getAllApps($pdo);
$users = getAllUsers($pdo);

$pageTitle = "Accueil";
require_once(__DIR__ . '/../partials/header.html.php');
?>

<h1 class="mb-4">Site de partage de solutions logicielles</h1>

<div class="row">
    <?php foreach (getApps($apps) as $app) : ?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">
                        <a href="../apps/apps_read.php?id=<?= $app['app_id']; ?>"
                           class="text-decoration-none text-primary">
                            <?= htmlspecialchars($app['name']); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?= nl2br(htmlspecialchars($app['description'])); ?></p>
                    <p class="mt-auto mb-0 text-muted">
                        <small><?= displayAuthor($app['author'], $users); ?></small>
                    </p>
                </div>
                <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                    <a href="../apps/apps_update.php?id=<?= $app['app_id']; ?>" class="btn btn-sm btn-warning">Modifier</a>
                    <a href="../apps/apps_delete.php?id=<?= $app['app_id']; ?>" class="btn btn-sm btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
