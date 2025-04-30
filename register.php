<?php
// register.php
require_once __DIR__ . '/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php?form=register');
    exit;
}

$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

if (!$email || !$password) {
    die('all fields is required.');
}

// проверим, существуем ли email
$stmt = $pdo->prepare('SELECT id FROM users WHERE email = ?');
$stmt->execute([$email]);
if ($stmt->fetch()) {
    die('Email is already in use');
}

// хешируем пароль и сохраняем
$hash = password_hash($password, PASSWORD_DEFAULT);
$stmt = $pdo->prepare('INSERT INTO users (email, password_hash) VALUES (?, ?)');
$stmt->execute([$email, $hash]);

header('Location: index.php?form=login&registered=1');
exit;