<?php
// index.php
require_once __DIR__ . '/config.php';

// выбор формы: login или register
$form = $_GET['form'] ?? 'login';

// уведомление об успешной регистрации
$registered = isset($_GET['registered']);
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

    <?php if ($registered): ?>
        <p class="msg success">Registration was successful</p>
    <?php endif; ?>

    <?php if ($form === 'register'): ?>
    <form action="register.php" method="post" novalidate>
        <div class="input-box">
            <input type="email" name="email" placeholder="Email" required>
        </div>
        <div class="input-box">
            <input type="password" name="password" placeholder="Password" minlength="6" required>
        </div>
        <button type="submit">Register</button>
    </form>
    <?php else: ?>
        <form action="login.php" method="post" novalidate>
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    <?php endif; ?>
</div>

<script>
    // Очистка форм при переключении
    document.querySelectorAll('.nav a').forEach(link => {
        link.addEventListener('click', () => window.location.reload());
    });
</script>
</body>
</html>
