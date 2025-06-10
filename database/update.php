<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$id = intval($_GET['id'] ?? null);
if (!$id) {
    header('Bad Request', true, 400);
    die('Bad Request');
}

$task = $_POST['task'] ?? null;
$status = $_POST['status'] ?? null;

if (!$task || !$status) {
    header('Bad Request', true, 400);
    die('Bad Request');
}

$db = DB::getDB();
$q = $db->prepare(
    'SELECT * FROM todo WHERE id = :id'
);

$q->execute(['id' => $id]);

$todo = $q->fetch();
if (!$todo) {
    header('Not Found', true, 404);
    die('Not Found');
}

$q = $db->prepare(
    'UPDATE todo SET task = :task, status = :status, updated_at = current_timestamp() WHERE id = :id'
);

$q->execute([
    'id' => $id,
    'task' => $task,
    'status' => $status,
]);

header("Location: view.php?id={$id}", true, 302);