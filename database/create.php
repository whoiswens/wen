<?php
require_once 'vendor/autoload.php';

use Uph\Database\Twig;

$twig = Twig::make('templates');
echo $twig->render('form.twig.html', [
    'action' =>'store.php',
    'task'=>'',
    'status' => 'todo',
]);