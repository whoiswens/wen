<!DOCTYPE html>
<html>
<head>
    <title>World</title>
</head>
<body>
    <h2>Hello World</h2>
    <form method="POST" action="">
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" minlength="3" required><br><br>

        <label>Jenis Kelamin: (harus dipilih)</label><br>
        <input type="radio" id="laki" name="gender" value="Laki-laki" required>
        <label for="laki">Laki-laki</label>
        <input type="radio" id="perempuan" name="gender" value="Perempuan" required>
        <label for="perempuan">Perempuan</label><br><br>

        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat" rows="4" cols="40" minlength="10" required></textarea><br><br>

        <input type="submit" name="submit" value="Kirim">
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = trim($_POST['nama']);
        $alamat = trim($_POST['alamat']);
        $gender = $_POST['gender'] ?? '';
 
        $isValid = true;

        if (strlen($nama) < 3) {
            echo "<p style='color:red;'>Nama harus minimal 3 huruf.</p>";
            $isValid = false;
        }

        if (empty($gender)) {
            echo "<p style='color:red;'>Jenis kelamin wajib dipilih.</p>";
            $isValid = false;
        }

        if (strlen($alamat) < 10) {
            echo "<p style='color:red;'>Alamat harus minimal 10 karakter.</p>";
            $isValid = false;
        }

        if ($isValid) {
            echo "<h3>Data yang Dikirim:</h3>";
            echo "Nama: " . htmlspecialchars($nama) . "<br>";
            echo "Jenis Kelamin: " . htmlspecialchars($gender) . "<br>";
            echo "Alamat: " . htmlspecialchars($alamat) . "<br>";
        }
    }
    ?>
</body>
</html>
