<?php
####################################################################
# Le code à compléter est commenté pour ne pas déclencher d'erreur #
####################################################################

// démarrer la session
session_start();
// ----------------------------
// ÉTAPE 1 : Vérifier que l'utilisateur est connecté
// - Si non connecté, rediriger vers index.php
// ----------------------------

/*if (!isset($_SESSION['LOGGED_USER'])) {
    ____; // redirection
}*/

// ----------------------------
// ÉTAPE 2 : Connexion à la BDD et récupération des données
// - Se connecter à la BDD avec getPDO()
// - Récupérer toutes les applications avec getAllApps($pdo)
// - Récupérer tous les utilisateurs avec getAllUsers($pdo)
// ----------------------------

/*$pdo = ____;
$apps = ____; // toutes les applications
$users = ____; // tous les utilisateurs*/

require_once(__DIR__ . '/../partials/header.html.php');
?>

<h1 class="mb-4">Site de partage de solutions logicielles</h1>

<h2 class="text-danger">Texte à supprimer</h2>
<h4>Complétez le code à trous pour l'affichage d’une carte Bootstrap, selon le modèle, avec :</h4>
<ul>
    <li>titre + lien "Infos"</li>
    <li>description,</li>
    <li>lien téléchargement,</li>
    <li>commentaires,</li>
    <li>bouton modifier avec son lien,</li>
    <li>bouton suppression avec son lien.</li>
</ul>

<!--<div class="row">
    <?php /*foreach (____($apps) as $app) : */?>
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="card h-100 shadow-sm border-primary">
                <div class="card-body d-flex flex-column">
                    <!-- Afficher le titre et le lien "Infos" -->
                    <h4 class="card-title">
                        <a href="../apps/app_read.php?id=<?php /*= $app['____']; */?>" class="text-decoration-none text-primary">
                            <?php /*= htmlspecialchars($app['____']); */?>
                            <span class="ms-2 text-info" style="font-size: 1rem;">
                                <i class="fa fa-hand-o-left"></i> Infos
                            </span>
                        </a>
                    </h4>

                    <!-- Afficher la description -->
                    <p class="card-text text-danger-emphasis"><?php /*= nl2br(htmlspecialchars($app['____'])); */?></p>

                    <!-- Lien de téléchargement -->
                    <span class="card-text"><i class="fa fa-download text-secondary"></i> Télécharger :
                        <a href="../files/<?php /*= $app['____']; */?>" class="text-decoration-none text-primary">
                            <?php /*= htmlspecialchars($app['____']); */?>
                        </a>
                    </span>

                    <!-- Nombre de commentaires -->
                    <?php /*$commentCount = countComments($pdo, $app['____']); */?>
                    <p class="mt-2 mb-0"><i class="fa fa-comments-o text-secondary"></i> Commentaires : <?php /*= $commentCount */?></p>

                    <!-- Créateur -->
                    <p class="mt-2 mb-0 text-muted"><i class="fa fa-user text-secondary"></i>
                        <small>Créateur : <?php /*= displayCreator($app['creator'], $users); */?></small>
                    </p>
                </div>

                <!-- Boutons Modifier et Supprimer -->
                <div class="card-footer bg-transparent border-top-0 d-flex justify-content-between">
                    <a href="../apps/app_update.html.php?id=<?php /*= $app['____']; */?>" class="btn btn-sm btn-warning">
                        <i class="fa fa-pencil-square-o"></i> Modifier
                    </a>
                    <a href="../apps/app_delete.php?id=<?php /*= $app['____']; */?>" class="btn btn-sm btn-danger"
                       onclick="return confirm('Etes-vous certain de vouloir supprimer cette application ?');">
                        <i class="fa fa-trash-o"></i> Supprimer
                    </a>
                </div>
            </div>
        </div>
    <?php /*endforeach; */?>
</div>-->

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>
