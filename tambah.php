<!DOCTYPE html>
<html lang="id">
<head><title>Tambah Pegawai Baru</title><style>body{font-family:arial;margin:20px;}input,select{width:300px;padding:5px;}input[type=submit]{background:#5cb85c;color:white;padding:8px 15px;border:none;}</style></head>
<body>
    <h1>Form Tambah Pegawai</h1>
    <form action="proses_tambah.php" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br><input type="text" name="nama" required><br><br>
        <label>NIP:</label><br><input type="text" name="nip" required><br><br>
        <label>Jabatan:</label><br><input type="text" name="jabatan" required><br><br>
        <label>Unit Kerja:</label><br><input type="text" name="unit_kerja" required><br><br>
        <label>Status Kepegawaian:</label><br>
        <select name="status_kepegawaian" required>
            <option value="PNS">PNS</option>
            <option value="PPPK">PPPK</option>
            <option value="Honor">Honor</option>
        </select><br><br>
        <label>Foto:</label><br><input type="file" name="foto"><br><br>
        <input type="submit" value="Simpan">
    </form>
    <br><a href="index.php">Kembali</a>
</body>
</html>