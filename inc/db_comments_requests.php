<?php
require_once(__DIR__ . '/db_connect.php');

function createComment(PDO $pdo, int $user_id, int $app_id, string $details): void
{
    $stmt = $pdo->prepare("
        INSERT INTO comments (user_id, app_id, comment, created_at)
        VALUES (:user_id, :app_id, :comment, NOW())
    ");
    $stmt->execute([
        'user_id' => $user_id,
        'app_id' => $app_id,
        'comment' => $details,
    ]);
}
