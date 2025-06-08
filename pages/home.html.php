<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');
$pageTitle = "Accueil";

if (!isset($_SESSION['LOGGED_USER'])) {
    redirectToUrl('../index.php');
}
// Se connecter à la base avec getPDO()
$pdo = getPDO();
// récupérer toutes les applis avec la fonction à créer getAllApps($pdo) contenue dans inc/db_apps_requests.php
//$apps =
// récupérer toutes les applis avec la fonction à créer getAllUsers($pdo) contenue dans inc/db_users_requests.php
$users = getAllUsers($pdo);

$pageTitle = "Accueil";
require_once(__DIR__ . '/../partials/header.html.php');
?>

<h1 class="mb-4">Site de partage de solutions logicielles</h1>
<h2 class="text-danger">Texte à supprimer</h2>
<p>Affichage d’une carte Bootstrap, selon le modèle, avec :</p>
<ul>
    <li>titre + lien "Infos"</li>
    <li>description,</li>
    <li>lien téléchargement,</li>
    <li>commentaires,</li>
    <li>bouton modifier avec son lien,</li>
    <li>bouton suppression avec son lien.</li>

</ul>

<div class="row">
<!--    Boucler sur les résultats pour afficher chaque app dans une carte Bootstrap-->
    <?php foreach (getApps($apps) as $app) : ?>
<!--        Affichage d’une carte Bootstrap, selon le modèle, avec :
            - titre + lien "Infos"
            - description,
            - lien téléchargement
            - commentaires
            - Créateurs
            - bouton modifier avec son lien
            - bouton suppression avec son lien

    <?php endforeach; ?>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
