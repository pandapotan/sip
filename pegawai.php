<?php
include 'koneksi.php';


 $search = isset($_GET['search']) ? $_GET['search'] : '';
 $filter_status = isset($_GET['filter_status']) ? $_GET['filter_status'] : '';


 $sql = "SELECT * FROM pegawai WHERE 1=1";
if (!empty($search)) {
    $sql .= " AND (nama LIKE '%$search%' OR nip LIKE '%$search%')";
}
if (!empty($filter_status)) {
    $sql .= " AND status_kepegawaian = '$filter_status'";
}
 $sql .= " ORDER BY id DESC";

 $hasil = $koneksi->query($sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
   
    <meta charset="UTF-8">
    
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
    <title>Daftar Pegawai</title>
    <style> body { font-family: arial; margin: 20px; } table { width: 100%; border-collapse: collapse; } th, td { border: 1px solid #ccc; padding: 8px; } th { background-color: #f2f2f2; } img { width: 50px; height: 50px; } a { text-decoration: none; } .form-cari { margin-bottom: 20px; padding: 10px; background: #e9ecef; border-radius: 5px; } </style>
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

    <h1>Data Pegawai</h1>
    <a href="tambah.php">Tambah Data</a>
    
    <div class="form-cari">
        <form method="GET" action="">
            <label>Cari (Nama/NIP):</label>
            <input type="text" name="search" value="<?= $search ?>">
            
            <label>Filter Status:</label>
            <select name="filter_status">
                <option value="">Semua</option>
                <option value="PNS" <?php if($filter_status=='PNS') echo 'selected'; ?>>PNS</option>
                <option value="PPPK" <?php if($filter_status=='PPPK') echo 'selected'; ?>>PPPK</option>
                <option value="Honor" <?php if($filter_status=='Honor') echo 'selected'; ?>>Honor</option>
            </select>
            
            <input type="submit" value="Cari">
        </form>
    </div>

    <table>
        <tr>
            <th>ID</th><th>Nama</th><th>NIP</th><th>Jabatan</th><th>Unit Kerja</th><th>Status</th><th>Foto</th><th>Aksi</th>
        </tr>
        <?php
        if ($hasil->num_rows > 0) {
            while($baris = $hasil->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $baris["id"] . "</td>";
                echo "<td>" . $baris["nama"] . "</td>";
                echo "<td>" . $baris["nip"] . "</td>";
                echo "<td>" . $baris["jabatan"] . "</td>";
                echo "<td>" . $baris["unit_kerja"] . "</td>";
                echo "<td>" . $baris["status_kepegawaian"] . "</td>";
                $lokasi_foto = 'uploads/' . $baris['foto'];
                if (!empty($baris['foto']) && file_exists($lokasi_foto)) {
                    echo "<td><img src='" . $lokasi_foto . "'></td>";
                } else {
                    echo "<td>-</td>";
                }
                echo "<td><a href='edit.php?id=" . $baris["id"] . "'>Ubah</a> | <a href='hapus.php?id=" . $baris["id"] . "'>Hapus</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>Data tidak ditemukan</td></tr>";
        }
        ?>
    </table>
</body>
</html>
<?php $koneksi->close(); ?>