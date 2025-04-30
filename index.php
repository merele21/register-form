<?php
// index.php
require_once __DIR__ . '/config.php';

// определяем, какую форму показывать
$form = $_GET['form'] ?? 'login';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login / Registration</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <nav>
        <a href="?form=login" class="<?= $form==='login' ? 'active' : '' ?>">Login</a>
        <a href="?form=register" class="<?= $form==='register' ? 'active' : '' ?>">Registration</a>
    </nav>

    <?php if ($form === 'register'): ?>
        <form action="register.php" method="post" class="form-box register">
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Register</button>
        </form>
    <?php else: ?>
        <form action="login.php" method="post" class="form-box login">
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
            </div>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
