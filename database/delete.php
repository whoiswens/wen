<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];

    $db = DB::getDB();

    // Pastikan data dengan ID itu ada
    $check = $db->prepare('SELECT * FROM todo WHERE id = :id');
    $check->execute(['id' => $id]);

    if ($check->fetch()) {
        $stmt = $db->prepare('DELETE FROM todo WHERE id = :id');
        $stmt->execute(['id' => $id]);

        header('Location: list.php?deleted=1');
        exit();
    } else {
        echo "Data tidak ditemukan.";
    }
} else {
    header('Location: list.php');
    exit();
}
