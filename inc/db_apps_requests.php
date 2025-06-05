<?php
require_once(__DIR__ . '/db_connect.php');

function getAllApps(PDO $pdo): array
{
    $stmt = $pdo->prepare('SELECT * FROM apps WHERE is_enabled IS TRUE');
    $stmt->execute();
    return $stmt->fetchAll();
}

// inc/db_apps_requests.php

function createApp(PDO $pdo, string $name, string $description, string $author, bool $isEnabled = true): string|false
{
    $stmt = $pdo->prepare(
        'INSERT INTO apps(name, description, author, is_enabled) VALUES (:name, :description, :author, :is_enabled)'
    );

    $stmt->execute([
        'name' => $name,
        'description' => $description,
        'author' => $author,
        'is_enabled' => $isEnabled ? 1 : 0,
    ]);

    return $pdo->lastInsertId();
}

function retrieveApp(PDO $pdo, int $id): array|false
{
    $stmt = $pdo->prepare('SELECT * FROM apps WHERE app_id = :id');
    $stmt->execute(['id' => $id,]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updateApp(PDO $pdo, int $id, string $name, string $description, string $author, bool $isEnabled = true): bool
{
    $stmt = $pdo->prepare('
        UPDATE apps 
        SET name = :name, description = :description, author = :author, is_enabled = :is_enabled 
        WHERE app_id = :id
    ');

    return $stmt->execute([
        'id' => $id,
        'name' => $name,
        'description' => $description,
        'author' => $author,
        'is_enabled' => $isEnabled,
    ]);
}
