<?php
####################################################################
# Le code à compléter est commenté pour ne pas déclencher d'erreur #
####################################################################

// démarrer la session
//_____;
// ----------------------------
// ÉTAPE 1 : Affichage des messages flash (si présents)
// ----------------------------

/*if (isset($_SESSION['flash'])) {
    // afficher le message avec alert Bootstrap
    // puis unset($_SESSION['flash']);
}*/

// ----------------------------
// ÉTAPE 2 : Vérification de l'ID d'application dans $_GET
// - Doit être numérique et présent
// - Sinon, afficher un message d'erreur
// ----------------------------

/*if (!isset($_GET['id']) || !____($_GET['id'])) {
    echo "Pas d'identifiant d'application valide.";
    return;
}*/

$id = (int)$_GET['id'];

// ----------------------------
// ÉTAPE 3 : Récupérer les détails de l'application
// - Se connecter à la BDD avec getPDO()
// - Appeler la fonction readApp($pdo, $id)
// - Si aucun résultat, afficher un message d'erreur
// ----------------------------

/*$pdo = ____;
$appDetails = ____;*/

// ----------------------------
// ÉTAPE 4 : Construire le tableau $app
// - Inclure l'application elle-même
// - Inclure un sous-tableau 'comments' pour ses commentaires
// ----------------------------

/*$app = [
        'app_id'      => ____,
        'name'        => ____,
        'description' => ____,
        'creator'     => ____,
        'file'        => ____,
        'comments'    => [],
];*/

// Boucle pour ajouter les commentaires
/*foreach ($appDetails as $detail) {
    if (!empty($detail['comment_id'])) {
        $app['comments'][] = [
                'comment_id' => ____,
                'details'    => ____,
                'user_id'    => ____,
                'full_name'  => ____,
                'created_at' => ____,
        ];
    }
}*/

// ----------------------------
// ÉTAPE 5 : Affichage de l'application
// - Nom, description, fichier (si présent), créateur
// ----------------------------
?>

<!--    <h1><?php /*= htmlspecialchars($app['____']) */?></h1>

    <div class="row">
        <article class="col">
            <p><?php /*= nl2br(htmlspecialchars($app['____'])) */?></p>
            <!-- Si fichier présent, lien de téléchargement -->
        </article>
        <aside class="col">
            <p><i>Crée par <?php /*= htmlspecialchars($app['____']) */?></i></p>
        </aside>
    </div>-->

    <hr>
    <h2>Commentaires</h2>

<?php if (!empty($app['comments'])) : ?>
    <?php foreach ($app['comments'] as $comment) : ?>
        <div class="comment mb-3">
            <p><strong><?= htmlspecialchars($comment['full_name']) ?></strong> — <?= $comment['created_at'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['details'])) ?></p>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p>Aucun commentaire pour le moment.</p>
<?php endif; ?>

    <hr>
<?php if (isset($_SESSION['LOGGED_USER'])) : ?>
    <!-- Bouton pour créer un commentaire -->
<?php endif; ?>

    <div class="mt-4">
        <a href="../pages/home.html.php" class="btn btn-dark">
            <i class="fa fa-reply"></i> Retour
        </a>
    </div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>