<?php
####################################################################
# Le code à compléter est commenté pour ne pas déclencher d'erreur #
####################################################################

// démarrer la session
//_____;
require_once(__DIR__ . '/../inc/requires.php');

// ----------------------------
// ÉTAPE 1 : Vérification des champs obligatoires
// - name et description doivent être présents
// - trim() + strip_tags() pour nettoyer
// - Si vide, stocker un flash message et rediriger vers le formulaire
// ----------------------------
/*if (____ || ____ || ____ === '' || ____ === '') {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => "Le nom et la description de l'application sont obligatoires."
    ];
    header('Location: ____'); // formulaire de création
    exit;
}*/

// ----------------------------
// ÉTAPE 2 : Nettoyage et préparation des données
// ----------------------------

/*$name = ____;
$description = ____;
$creator = $_SESSION['LOGGED_USER']['email'] ?? 'unknown';
$uploadDir = __DIR__ . '/../files/';*/

// ----------------------------
// ÉTAPE 3 : Gestion du fichier ZIP (obligatoire pour la création)
// - Vérifier que $_FILES['file'] existe et upload OK
// - Vérifier extension .zip
// - Générer un nom unique
// - Déplacer le fichier
// - Si erreur, stocker flash message et rediriger
// ----------------------------

/*if (____) {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => "Un fichier ZIP est obligatoire pour créer une application."
    ];
    header('Location: ____');
    exit;
}

//$fileTmpPath = ____;
//$originalName = ____;
//$fileExtension = ____;

if (____) {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => "Le fichier doit être au format ZIP."
    ];
    header('Location: ____');
    exit;
}

$file = ____;
$destPath = ____;

if (!move_uploaded_file($fileTmpPath, $destPath)) {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => "Erreur lors du téléchargement du fichier."
    ];
    header('Location: ____');
    exit;
}*/

// ----------------------------
// ÉTAPE 4 : Insertion en BDD
// - Utiliser getPDO() et createApp()
// - Stocker le résultat dans $success
// ----------------------------

/*$pdo = ____;
$success = ____;*/

// ----------------------------
// ÉTAPE 5 : Flash message + stockage pour récapitulatif
// ----------------------------

/*if ($success) {
    $_SESSION['flash'] = [
        'type' => 'success',
        'message' => "Votre application a été ajoutée avec succès."
    ];
    $_SESSION['created_app'] = [
        'name'        => $name,
        'description' => $description,
        'creator'     => $creator,
        'file'        => $file
    ];
} else {
    $_SESSION['flash'] = [
        'type' => 'danger',
        'message' => "Une erreur est survenue lors de l'ajout de votre application."
    ];
}*/

// ----------------------------
// ÉTAPE 6 : Redirection vers la page de récapitulatif
// ----------------------------

/*header('Location: ____');
exit;*/
