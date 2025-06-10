<?php
require '../vendor/autoload.php';

use Uph\Hello\Twig;

session_start();

if (empty($_SESSION['authenticated'])) {
    header('Location: /auth/login.php');
    exit;
}

$twig = Twig::make(__DIR__ . '/templates');

echo $twig->render('protected.html.twig');
