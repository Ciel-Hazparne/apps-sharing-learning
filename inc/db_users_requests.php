<?php
require_once(__DIR__ . '/db_connect.php');

function getAllUsers(PDO $pdo): array
{
    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    return $stmt->fetchAll();
}