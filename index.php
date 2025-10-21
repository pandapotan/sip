<?php
include 'koneksi.php';


 $hitung_pegawai = $koneksi->query("SELECT COUNT(*) as total FROM pegawai");
 $total_pegawai = $hitung_pegawai->fetch_assoc()['total'];


 $hari_ini = date('Y-m-d');
 $hitung_hadir = $koneksi->query("SELECT COUNT(*) as jumlah FROM absensi WHERE tanggal = '$hari_ini' AND status = 'Hadir'");
 $jumlah_hadir = $hitung_hadir->fetch_assoc()['jumlah'];
 $persentase_kehadiran = $total_pegawai > 0 ? ($jumlah_hadir / $total_pegawai) * 100 : 0;


 $tertinggi = $koneksi->query("SELECT p.nama, k.nilai_kinerja FROM kinerja k JOIN pegawai p ON k.pegawai_id = p.id ORDER BY k.nilai_kinerja DESC LIMIT 1");
 $pegawai_tertinggi = $tertinggi->fetch_assoc();

 $terendah = $koneksi->query("SELECT p.nama, k.nilai_kinerja FROM kinerja k JOIN pegawai p ON k.pegawai_id = p.id ORDER BY k.nilai_kinerja ASC LIMIT 1");
 $pegawai_terendah = $terendah->fetch_assoc();
?>

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

    <div class="card-container">
        <div class="card">
            <h3>Total Pegawai Aktif</h3>
            <div class="angka"><?= $total_pegawai ?></div>
        </div>
        <div class="card">
            <h3>Kehadiran Hari Ini</h3>
            <div class="angka"><?= number_format($persentase_kehadiran, 1) ?>%</div>
            <p>(<?= $jumlah_hadir ?> dari <?= $total_pegawai ?>)</p>
        </div>
        <div class="card">
            <h3>Kinerja Tertinggi</h3>
            <div class="angka"><?= $pegawai_tertinggi['nilai_kinerja'] ?></div>
            <p><?= $pegawai_tertinggi['nama'] ?></p>
        </div>
        <div class="card">
            <h3>Kinerja Terendah</h3>
            <div class="angka"><?= $pegawai_terendah['nilai_kinerja'] ?></div>
            <p><?= $pegawai_terendah['nama'] ?></p>
        </div>
    </div>

</body>
</html>