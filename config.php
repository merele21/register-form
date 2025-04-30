<?php
// config.php
declare(strict_types=1);

$host = '127.0.0.1';
$db = 'phpmyadmin';
$user = 'phpmyadmin';
$pass = 'wh1tehat#1374^&';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    exit('DB connection failed: ' . $e->getMessage());
}
