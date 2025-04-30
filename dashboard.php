<?php
require_once __DIR__ . '/config.php';

if (empty($_SESSION['user_id'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><title>Dashboard</title></head>
<body>
  <h1>Welcome, user #<?=htmlspecialchars($_SESSION['user_id'])?></h1>
  <a href="logout.php">Logout</a>
</body>
</html>
