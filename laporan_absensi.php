<?php
include 'koneksi.php';


 $tanggal_dari = isset($_GET['tanggal_dari']) ? $_GET['tanggal_dari'] : '';
 $tanggal_sampai = isset($_GET['tanggal_sampai']) ? $_GET['tanggal_sampai'] : '';
 $pegawai_id_filter = isset($_GET['pegawai_id']) ? $_GET['pegawai_id'] : '';


 $sql = "SELECT a.*, p.nama, p.nip FROM absensi a JOIN pegawai p ON a.pegawai_id = p.id WHERE 1=1";
if (!empty($tanggal_dari) && !empty($tanggal_sampai)) {
    $sql .= " AND a.tanggal BETWEEN '$tanggal_dari' AND '$tanggal_sampai'";
}
if (!empty($pegawai_id_filter)) {
    $sql .= " AND a.pegawai_id = $pegawai_id_filter";
}
 $sql .= " ORDER BY a.tanggal DESC, a.waktu_masuk ASC";

 $hasil = $koneksi->query($sql);
 $daftar_pegawai = $koneksi->query("SELECT id,nip, nama FROM pegawai ORDER BY nama");
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
    <title>Laporan Absensi</title>
    <style> body { font-family: arial; margin: 20px; } table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #ccc; padding: 8px; } th { background: #f2f2f2; } .form-cari { margin-bottom: 20px; padding: 10px; background: #e9ecef; border-radius: 5px; } </style>
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

    <h1>Laporan Data Absensi</h1>
    
    <div class="form-cari">
        <form method="GET" action="">
            <label>Dari Tanggal:</label>
            <input type="date" name="tanggal_dari" value="<?= $tanggal_dari ?>">
            
            <label>Sampai Tanggal:</label>
            <input type="date" name="tanggal_sampai" value="<?= $tanggal_sampai ?>">
            
            <label>Pegawai:</label>
            <select name="pegawai_id">
                <option value="">Semua Pegawai</option>
                <?php while($p = $daftar_pegawai->fetch_assoc()): ?>
                    <option value="<?= $p['id'] ?>" <?php if($pegawai_id_filter==$p['id']) echo 'selected'; ?>><?= $p['nama'] ?> (<?= $p['nip'] ?>)</option>
                <?php endwhile; ?>
            </select>
            
            <input type="submit" value="Tampilkan Laporan">
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th><th>Nama Pegawai</th><th>NIP</th><th>Tanggal</th><th>Masuk</th><th>Pulang</th><th>Status</th>
        </tr>
        <?php if ($hasil->num_rows > 0): while($baris = $hasil->fetch_assoc()): ?>
        <tr>
            <td><?= $baris['id'] ?></td>
            <td><?= $baris['nama'] ?></td>
            <td><?= $baris['nip'] ?></td>
            <td><?= $baris['tanggal'] ?></td>
            <td><?= $baris['waktu_masuk'] ?></td>
            <td><?= $baris['waktu_pulang'] ?></td>
            <td><?= $baris['status'] ?></td>
        </tr>
        <?php endwhile; else: ?>
        <tr><td colspan='7'>Tidak ada data laporan pada periode yang dipilih.</td></tr>
        <?php endif; ?>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>