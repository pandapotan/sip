<?php include 'koneksi.php'; $daftar_pegawai = $koneksi->query("SELECT id, nama FROM pegawai"); ?>
<!DOCTYPE html><head><title>Tambah Kinerja</title><style>body{font-family:arial;margin:20px;}input,select,textarea{width:300px;padding:5px;}input[type=submit]{background:#5cb85c;color:white;padding:8px 15px;border:none;}</style></head>
<body>
    <h1>Form Tambah Kinerja</h1>
    <form action="proses_tambah_kinerja.php" method="post">
        <label>Pegawai:</label><br>
        <select name="pegawai_id" required><option value="">-- Pilih --</option>
            <?php while($p = $daftar_pegawai->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php endwhile; ?>
        </select><br><br>
        <label>Periode:</label><br><input type="text" name="periode" placeholder="contoh: Oktober 2023" required><br><br>
        <label>Deskripsi:</label><br><textarea name="deskripsi" required></textarea><br><br>
        <label>Nilai Kinerja:</label><br><input type="number" name="nilai_kinerja" required><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br><a href="kinerja.php">Kembali</a>
</body>
</html>