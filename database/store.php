<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$task = $_POST['task'] ?? null;
$status = $_POST['status'] ?? null;

if (!$task || !$status){
    header('Bad Request', true, 400);
    die('Bad Request');
}

try{
    $db = DB::getDB();
    $q = $db->prepare(<<<SQL
        INSERT INTO `todo` (`task`, `status`, `created_at`, `updated_at`) 
        VALUES (:task, :status, current_timestamp(), current_timestamp());
    SQL);
    $q->execute([
        'task' => $task,
        'status' => $status,
    ]);
    
    header('Location: list.php', true, 302);
}
catch (\Exception $e){
    header('Internal Server Error', true, 500);
    echo "Some error happened: {$e->getMessage()}";
}
