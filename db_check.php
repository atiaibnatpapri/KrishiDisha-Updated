<?php
require_once __DIR__ . '/config/db.php';

$checks = [
    'database' => DB_NAME,
    'host' => DB_HOST,
    'users' => $pdo->query("SELECT COUNT(*) FROM USER")->fetchColumn(),
    'crops' => $pdo->query("SELECT COUNT(*) FROM CROP")->fetchColumn(),
    'diseases' => $pdo->query("SELECT COUNT(*) FROM DISEASE")->fetchColumn(),
];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>KrishiDisha DB Check</title>
    <style>
        body { font-family: Arial, sans-serif; background:#f8faf9; color:#1a1a2e; padding:40px; }
        .box { max-width:640px; background:#fff; border:1px solid #d1e7d8; border-radius:10px; padding:24px; box-shadow:0 4px 20px rgba(45,106,79,.1); }
        h1 { margin-top:0; color:#2d6a4f; }
        code { background:#eef6f1; padding:3px 6px; border-radius:5px; }
        li { margin:8px 0; }
    </style>
</head>
<body>
    <div class="box">
        <h1>Database Connected</h1>
        <p>KrishiDisha can connect to MySQL successfully.</p>
        <ul>
            <li>Host: <code><?= htmlspecialchars($checks['host']) ?></code></li>
            <li>Database: <code><?= htmlspecialchars($checks['database']) ?></code></li>
            <li>Users: <code><?= (int)$checks['users'] ?></code></li>
            <li>Crops: <code><?= (int)$checks['crops'] ?></code></li>
            <li>Diseases: <code><?= (int)$checks['diseases'] ?></code></li>
        </ul>
        <p><a href="#" class="js-auth-open" data-tab="login">Go to Login</a></p>
    </div>
</body>
</html>
