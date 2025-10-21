<?php include 'koneksi.php'; $daftar_pegawai = $koneksi->query("SELECT id, nama FROM pegawai"); ?>
<!DOCTYPE html><head><title>Tambah Absensi</title><style>body{font-family:arial;margin:20px;}input,select{width:300px;padding:5px;}input[type=submit]{background:#5cb85c;color:white;padding:8px 15px;border:none;}</style></head>
<body>
    <h1>Form Tambah Absensi</h1>
    <form action="proses_tambah_absensi.php" method="post">
        <label>Pegawai:</label><br>
        <select name="pegawai_id" required><option value="">-- Pilih Pegawai --</option>
            <?php while($p = $daftar_pegawai->fetch_assoc()): ?>
                <option value="<?= $p['id'] ?>"><?= $p['nama'] ?></option>
            <?php endwhile; ?>
        </select><br><br>
        <label>Tanggal:</label><br><input type="date" name="tanggal" required><br><br>
        <label>CekIn:</label><br><input type="time" name="waktu_masuk"><br><br>
        <label>CekOut:</label><br><input type="time" name="waktu_pulang"><br><br>
        <label>Status:</label><br>
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
            <option value="Cuti">Cuti</option>
        </select><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br><a href="absensi.php">Kembali</a>
</body>
</html>