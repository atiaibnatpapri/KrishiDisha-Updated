<?php
require_once __DIR__ . '/includes/auth_check.php';
header('Content-Type: text/plain; charset=utf-8');

echo "Session name: " . session_name() . PHP_EOL;
echo "Session id: " . session_id() . PHP_EOL;
echo "Logged in: " . (isLoggedIn() ? 'yes' : 'no') . PHP_EOL;
echo "User id: " . ($_SESSION['user_id'] ?? 'none') . PHP_EOL;
echo "Role: " . ($_SESSION['role'] ?? 'none') . PHP_EOL;
echo "Status: " . ($_SESSION['status'] ?? 'none') . PHP_EOL;
