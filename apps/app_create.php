<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');

// ÉTAPE 1 : Vérifier que l’utilisateur est connecté
// Si non connecté, rediriger vers index.php
if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('../index.php');
}

// ÉTAPE 2 : Récupérer les données envoyées par le formulaire
$dataApp = $_POST;

// ÉTAPE 3 : Vérifier que les champs 'name' et 'description' existent ET ne sont pas vides une fois nettoyés
// - Nettoyer avec trim() + strip_tags()
// - Si un champ est vide après nettoyage, afficher un message et arrêter l’exécution
// - Sinon, stocker dans les variables : $name et $description

// Exemple :
// $name = trim(strip_tags($dataApp['name']));
// $description = trim(strip_tags($dataApp['description']));

// ÉTAPE 4 : Récupérer l’email de l’utilisateur connecté à partir de la session
// => le stocker dans $creator

// ÉTAPE 5 : Préparer une variable $file à null
// On l’utilisera uniquement si un fichier est bien uploadé

// ÉTAPE 6 : Vérifier si un fichier ZIP a été envoyé correctement
// - Utiliser $_FILES['file']['error'] === UPLOAD_ERR_OK
// - Vérifier que l’extension du fichier est bien "zip"
// - Créer un nom unique avec uniqid()
// - Définir le dossier de destination : '../files/'
// - Déplacer le fichier temporaire vers ce dossier
// - Si échec de déplacement ou mauvaise extension, afficher une erreur et arrêter

// Exemple de nom :
// $file = uniqid('app_', true) . '.zip';

// ÉTAPE 7 : Se connecter à la base de données avec getPDO()

// ÉTAPE 8 : Appeler la fonction createApp($pdo, $name, $description, $creator, $file)
// Cette fonction se trouve dans inc/db_apps_requests.php
// Elle insère une nouvelle ligne dans la table apps

// ÉTAPE 9 : Afficher un message de confirmation avec les données de l’appli créée
?>

<?php require_once(__DIR__ . '/../partials/header.html.php'); ?>

<h1>Application ajoutée avec succès !</h1>

<!-- ÉTAPE 10 : Afficher une carte Bootstrap récapitulative -->
<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= htmlspecialchars($name ?? '') ?></h5>
        <p class="card-text"><b>Email</b> : <?= htmlspecialchars($creator ?? '') ?></p>
        <p class="card-text"><b>Description</b> : <?= nl2br(htmlspecialchars($description ?? '')) ?></p>
        <?php if (!empty($file)): ?>
            <p class="card-text"><b>Fichier</b> : <a href="../files/<?= $file ?>" target="_blank"><?= $file ?></a></p>
        <?php endif; ?>
        <a href="../pages/home.html.php" class="btn btn-dark">
            <i class="fa fa-reply"></i> Retour à l'accueil
        </a>
    </div>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
