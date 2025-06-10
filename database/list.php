<?php

require_once 'vendor/autoload.php';

use Uph\Database\DB;

$db = DB::getDB();
$q = $db->query('SELECT * FROM todo');

echo "<table border='1' cellpadding='5'>";
echo "<tr>
        <th>ID</th>
        <th>Task</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Aksi</th>
      </tr>";

while ($row = $q->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['task']}</td>
            <td>{$row['status']}</td>
            <td>{$row['created_at']}</td>
            <td>{$row['updated_at']}</td>
            <td>
                <form action='delete.php' method='POST' onsubmit=\"return confirm('Yakin hapus data ini?');\">
                    <input type='hidden' name='id' value='{$row['id']}'>
                    <button type='submit'>Hapus</button>
                </form>
            </td>
          </tr>";
}

echo "</table>";
