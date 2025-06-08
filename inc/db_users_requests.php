<?php
require_once(__DIR__ . '/db_connect.php');

function getAllUsers(PDO $pdo): array
{
    $stmt = $pdo->prepare('SELECT * FROM users');
    $stmt->execute();
    return $stmt->fetchAll();
}

function createUser(PDO $pdo, string $full_name, int $age, string $email, string $password): bool
{
    $sql = "INSERT INTO users (full_name, age, email, password) VALUES (:full_name, :age, :email, :password)";
    $stmt = $pdo->prepare($sql);
    return $stmt->execute([
        'full_name' => $full_name,
        'age' => $age,
        'email' => $email,
        'password' => $password,
    ]);
}

function getUserByEmail(PDO $pdo, string $email): ?array
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ?: null;
}

function updateUser(PDO $pdo, int $userId, string $fullName, int $age, string $email, ?string $password): void
{
    if ($password !== null) {
        $sql = "UPDATE users SET full_name = :full_name, age = :age, email = :email, password = :password WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'full_name' => $fullName,
            'age' => $age,
            'email' => $email,
            'password' => $password,
            'user_id' => $userId
        ]);
    } else {
        $sql = "UPDATE users SET full_name = :full_name, age = :age, email = :email WHERE user_id = :user_id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'full_name' => $fullName,
            'age' => $age,
            'email' => $email,
            'user_id' => $userId
        ]);
    }
}

function deleteUserByEmail(PDO $pdo, string $email): void {
    $query = "DELETE FROM users WHERE email = :email";
    $stmt = $pdo->prepare($query);
    $stmt->execute(['email' => $email]);
}

