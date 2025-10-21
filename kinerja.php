<?php include 'koneksi.php'; $perintah = "SELECT k.*, p.nama FROM kinerja k JOIN pegawai p ON k.pegawai_id = p.id ORDER BY k.periode DESC"; $hasil = $koneksi->query($perintah); ?>
<!DOCTYPE html><head>
    
    <style>
        body { font-family: arial; margin: 20px; background-color: #f4f4f4; }
        .header { background: #333; color: white; padding: 10px; text-align: center; }
        .nav { background: #444; padding: 5px; }
        .nav a { color: white; text-decoration: none; padding: 10px; display: inline-block; }
        .nav a:hover { background: #555; }
        .card-container { display: flex; flex-wrap: wrap; gap: 20px; margin-top: 20px; }
        .card { background: white; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); flex: 1; min-width: 250px; text-align: center; }
        .card h3 { margin-top: 0; }
        .card .angka { font-size: 2em; font-weight: bold; color: #007bff; }
    </style>
    
<title>Data Kinerja</title><style>body{font-family:arial;margin:20px;}table{width:100%;border-collapse:collapse;}th,td{border:1px solid #ccc;padding:8px;}th{background:#f2f2f2;}</style></head>
<body>
     <div class="header">
        <h1>Sistem Manajemen Pegawai</h1>
    </div>
    <div class="nav">
        <a href="index.php">Dashboard</a>
        <a href="pegawai.php">Daftar Pegawai</a>
        <a href="absensi.php">Kelola Absensi</a>
        <a href="kinerja.php">Kelola Kinerja</a>
        <a href="laporan_absensi.php">Laporan Absensi</a>
    </div>
    <h1>Data Kinerja</h1>
    <a href="tambah_kinerja.php">+ Tambah Kinerja</a> | <a href="index.php">Kembali</a>
    <br><br>
    <table>
        <tr><th>ID</th><th>Nama Pegawai</th><th>Periode</th><th>Nilai Kinerja</th><th>Aksi</th></tr>
        <?php if ($hasil->num_rows > 0): while($baris = $hasil->fetch_assoc()): ?>
        <tr>
            <td><?= $baris['id'] ?></td>
            <td><?= $baris['nama'] ?></td>
            <td><?= $baris['periode'] ?></td>
            <td><?= $baris['nilai_kinerja'] ?></td>
            <td><a href="hapus_kinerja.php?id=<?= $baris['id'] ?>">Hapus</a></td>
        </tr>
        <?php endwhile; else: ?>
        <tr><td colspan='5'>Data kosong</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>