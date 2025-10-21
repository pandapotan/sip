<?php
include 'koneksi.php';
 $id_pegawai = $_GET['id'];
 $perintah = "SELECT * FROM pegawai WHERE id = $id_pegawai";
 $hasil = $koneksi->query($perintah);
 $data = $hasil->fetch_assoc();
?>
<!DOCTYPE html><head><title>Ubah Data Pegawai</title><style>body{font-family:arial;margin:20px;}input,select{width:300px;padding:5px;}input[type=submit]{background:#f0ad4e;color:white;padding:8px 15px;border:none;}</style></head>
<body>
    <h1>Ubah Data Pegawai</h1>
    <form action="proses_edit.php" method="post">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <label>Nama:</label><br><input type="text" name="nama" value="<?php echo $data['nama']; ?>" required><br><br>
        <label>NIP:</label><br><input type="text" name="nip" value="<?php echo $data['nip']; ?>" required><br><br>
        <label>Jabatan:</label><br><input type="text" name="jabatan" value="<?php echo $data['jabatan']; ?>" required><br><br>
        <label>Unit Kerja:</label><br><input type="text" name="unit_kerja" value="<?php echo $data['unit_kerja']; ?>" required><br><br>
        <label>Status Kepegawaian:</label><br>
        <select name="status_kepegawaian" required>
            <option value="PNS" <?php if($data['status_kepegawaian']=='PNS') echo 'selected'; ?>>PNS</option>
            <option value="PPPK" <?php if($data['status_kepegawaian']=='PPPK') echo 'selected'; ?>>PPPK</option>
            <option value="Honor" <?php if($data['status_kepegawaian']=='Honor') echo 'selected'; ?>>Honor</option>
        </select><br><br>
        <input type="submit" value="Update">
    </form>
    <br><a href="index.php">Kembali</a>
</body>
</html>
<?php $koneksi->close(); ?>