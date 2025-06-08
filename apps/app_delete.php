<?php
session_start();
require_once(__DIR__ . '/../inc/requires.php');

// ÉTAPE 1 : Vérifier que l’identifiant de l’application est bien présent dans l’URL
// => il doit être passé en GET sous la forme ?id=NUMÉRO
// - Si l’identifiant n’existe pas OU n’est pas un nombre, afficher une erreur et arrêter l’exécution
// - Sinon, convertir l’identifiant en entier et le stocker dans $id

// Exemple :
// $id = (int) $_GET['id'];

// ÉTAPE 2 : Se connecter à la base de données via getPDO()

// ÉTAPE 3 : Récupérer l'application à supprimer avec la fonction retrieveApp($pdo, $id)
// => permet de vérifier si elle existe et d’avoir accès au fichier associé

// Si l’application n’existe pas (résultat = false), afficher une erreur et arrêter

// ÉTAPE 4 : Si l’application contient un fichier (champ 'file' non vide) :
// - Construire le chemin complet du fichier avec __DIR__ . '/../files/' . $app['file']
// - Vérifier que ce fichier existe réellement avec file_exists()
// - Si oui, le supprimer avec unlink()

// ÉTAPE 5 : Supprimer l’application dans la base de données
// - Préparer une requête SQL : DELETE FROM apps WHERE app_id = :id
// - Exécuter cette requête avec l’identifiant

// ÉTAPE 6 : Stocker le résultat dans une variable $deleted
// Cette variable servira à afficher un message de succès ou d’échec
?>

<?php require_once(__DIR__ . '/../partials/header.html.php'); ?>

<!-- ÉTAPE 7 : Afficher un message en fonction du succès ou de l’échec de la suppression -->
<div>
    <?php if ($deleted ?? false): ?>
        <h1>Application supprimée avec succès</h1>
        <a href="/index.php" class="btn btn-secondary"><i class="fa fa-reply"></i> Retour à l’accueil</a>
    <?php else: ?>
        <div class="alert alert-danger">La suppression a échoué.</div>
    <?php endif; ?>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
