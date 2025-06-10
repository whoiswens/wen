<?php
require '../vendor/autoload.php';

use Uph\Hello\Twig;

$twig = Twig::make(__DIR__ . '/templates');

session_start();

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo $twig->render('login.html.twig');
    exit;
}

if (!$username || !$password) {
    echo $twig->render('login.html.twig', ['error' => 'Username dan password wajib diisi']);
    exit;
}

if ($username !== 'user' || $password !== 'pass') {
    echo $twig->render('login.html.twig', ['error' => 'Login salah']);
    exit;
}

session_regenerate_id();
$_SESSION['authenticated'] = true;
header('Location: index.php');
exit;
