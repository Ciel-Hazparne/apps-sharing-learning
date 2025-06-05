<?php

const MYSQL_HOST = 'localhost';
const MYSQL_PORT = 3306;
const MYSQL_NAME = 'apps_sharing';
const MYSQL_USER = 'admin';
const MYSQL_PASSWORD = 'admin';

function getPDO(): PDO {
    try {
        $pdo = new PDO(
            sprintf('mysql:host=%s;dbname=%s;port=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME, MYSQL_PORT),
            MYSQL_USER,
            MYSQL_PASSWORD
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (Exception $exception) {
        die('Erreur : ' . $exception->getMessage());
    }
}
