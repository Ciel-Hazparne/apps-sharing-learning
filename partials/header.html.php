<?php
if (!isset($pageTitle)) {
    $pageTitle = "Apps Sharing";
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle) ?></title>
    <link href="https://bootswatch.com/5/brite/bootstrap.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
<?php require_once(__DIR__ . '/navbar.html.php'); ?>
<main class="flex-fill container py-4">
