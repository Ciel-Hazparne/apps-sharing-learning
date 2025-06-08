<?php
session_start();

require_once(__DIR__ . '/../inc/requires.php');
require_once(__DIR__ . '/../security/isConnected.php');
require_once(__DIR__ . '/../partials/header.html.php');

// ÉTAPE 1 : Affichage des messages flash s’ils existent (déjà codé, rien à modifier ici)
if (isset($_SESSION['flash'])): ?>
    <div class="alert alert-<?= $_SESSION['flash']['type']; ?>">
        <?= $_SESSION['flash']['message']; ?>
    </div>
    <?php unset($_SESSION['flash']); ?>
<?php endif; ?>

<?php
// ÉTAPE 2 : Vérifier que l’ID est présent dans l’URL en GET et que c’est un nombre
// => sinon afficher un message d’erreur et arrêter le script

// Exemple :
// if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
//     echo "Pas d'identifiant d'application valide.";
//     return;
// }

// ÉTAPE 3 : Récupérer l’ID et le convertir en entier (avec (int))
// ÉTAPE 4 : Se connecter à la base de données avec getPDO()
// ÉTAPE 5 : Appeler la fonction readApp($pdo, $id) qui retourne un tableau
// contenant les informations de l’application ET des commentaires associés
// => stocker le résultat dans la variable $appDetails

// Si l’application n’existe pas (résultat vide), afficher un message d’erreur et arrêter

// ÉTAPE 6 : Initialiser un tableau associatif $app avec les informations générales :
// - app_id, name, description, creator, file
// - un tableau vide pour 'comments'

// Exemple :
// $app = [
//     'app_id' => ...,
//     'name' => ...,
//     ...
//     'comments' => []
// ];

// ÉTAPE 7 : Parcourir $appDetails pour ajouter les commentaires à $app['comments']
// - Si 'comment_id' est non vide : créer un sous-tableau avec les infos du commentaire
//   (comment_id, details, user_id, full_name, created_at)
// - Ajouter ce sous-tableau dans le tableau $app['comments'] avec $app['comments'][]

// FIN DU TRAITEMENT PHP, AFFICHAGE HTML CI-DESSOUS
?>

<h1><?= htmlspecialchars($app['name']) ?></h1>

<div class="row">
    <article class="col">
        <p><?= nl2br(htmlspecialchars($app['description'])) ?></p>

        <!-- Si l’application a un fichier, proposer le lien de téléchargement -->
        <?php if (!empty($app['file'])) : ?>
            <a href="../files/<?= htmlspecialchars($app['file']); ?>" class="btn btn-sm btn-success mt-2" download>
                <i class="fa fa-download"></i> Télécharger l’application
            </a>
        <?php endif; ?>
    </article>

    <aside class="col">
        <p><i>Créé par <?= htmlspecialchars($app['creator']) ?></i></p>
    </aside>
</div>

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
<!-- Si un utilisateur est connecté, proposer le lien pour ajouter un commentaire -->
<?php if (isset($_SESSION['LOGGED_USER'])) : ?>
    <div class="mb-3">
        <a href="../comments/comment_create.html.php?app_id=<?= $app['app_id']; ?>"
           class="btn btn-primary"><i class="fa fa-pencil-square-o"></i> Laisser un commentaire
        </a>
    </div>
<?php endif; ?>

<div class="mt-4">
    <a href="../pages/home.php" class="btn btn-dark">
        <i class="fa fa-reply"></i> Retour
    </a>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
