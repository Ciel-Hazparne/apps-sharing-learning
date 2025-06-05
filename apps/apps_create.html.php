<?php
session_start();

require_once(__DIR__ . '/../security/isConnected.php');
?>
<div>
    <h1>Ajouter une appli</h1>
    <form action="apps_create.php" method="POST">
        <div class="mb-3">
            <label for="name" class="form-label">Titre de l'appli</label>
            <input type="text" class="form-control" id="name" name="name">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description de l'appli</label>
            <textarea class="form-control" placeholder="Fonctionnalités essentielles en quelques lignes." id="app" name="app"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>

<?php require_once(__DIR__ . '/../partials/footer.html.php'); ?>