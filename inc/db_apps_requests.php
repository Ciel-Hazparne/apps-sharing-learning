<?php
require_once(__DIR__ . '/db_connect.php');

/*function getAllApps(PDO $pdo): array
{
CODE à compléter
}*/

// inc/db_apps_requests.php

/*function createApp(PDO $pdo, à compléter): string|false
{
    CODE à compléter

    return $pdo->lastInsertId();
}*/

function retrieveApp(PDO $pdo, int $id): array|false
{
    $stmt = $pdo->prepare('
        SELECT * FROM apps
        WHERE app_id = :id
    ');
    $stmt->execute(['id' => $id,]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateApp(PDO $pdo, int $id, string $name, string $description, string $creator, string $file, bool $isEnabled = true): bool
{
    $stmt = $pdo->prepare('
        UPDATE apps 
        SET name = :name, description = :description, creator = :creator, file = :file, is_enabled = :is_enabled 
        WHERE app_id = :id
    ');

    return $stmt->execute([
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'creator' => $creator,
        'file' => $file,
        'is_enabled' => $isEnabled,
    ]);
}
// jointure LEFT JOIN entre les tables apps, comments et users
/*function readApp(PDO $pdo, int $id): array|false
{
    CODE à compléter
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}*/
