<?php include 'koneksi.php'; $perintah = "SELECT a.*, p.nama FROM absensi a JOIN pegawai p ON a.pegawai_id = p.id ORDER BY a.tanggal DESC"; $hasil = $koneksi->query($perintah); ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Manajemen Pegawai</title>
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

    



<title>Data Absensi</title><style>body{font-family:arial;margin:20px;}table{width:100%;border-collapse:collapse;}th,td{border:1px solid #ccc;padding:8px;}th{background:#f2f2f2;}</style>

</head>


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
    
    <h1>Data Absensi</h1>
    <a href="tambah_absensi.php">+ Tambah Absensi</a> | <a href="index.php">Kembali</a>
    <br><br>
    <table>
        <tr><th>ID</th><th>Nama Pegawai</th><th>Tanggal</th><th>Masuk</th><th>Pulang</th><th>Status</th><th>Aksi</th></tr>
        <?php if ($hasil->num_rows > 0): while($baris = $hasil->fetch_assoc()): ?>
        <tr>
            <td><?= $baris['id'] ?></td>
            <td><?= $baris['nama'] ?></td>
            <td><?= $baris['tanggal'] ?></td>
            <td><?= $baris['waktu_masuk'] ?></td>
            <td><?= $baris['waktu_pulang'] ?></td>
            <td><?= $baris['status'] ?></td>
            <td><a href="hapus_absensi.php?id=<?= $baris['id'] ?>">Hapus</a></td>
        </tr>
        <?php endwhile; else: ?>
        <tr><td colspan='7'>Data kosong</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>