<?php
include 'koneksi.php';
 $nama_file = '';
if ($_FILES['foto']['error'] == 0) {
    $tmp_nama = $_FILES['foto']['tmp_name'];
    $nama_file = time() . '_' . $_FILES['foto']['name'];
    move_uploaded_file($tmp_nama, 'uploads/' . $nama_file);
}
 $perintah = "INSERT INTO pegawai (nip, nama, jabatan, unit_kerja, status_kepegawaian, foto) VALUES ('$_POST[nip]', '$_POST[nama]', '$_POST[jabatan]', '$_POST[unit_kerja]', '$_POST[status_kepegawaian]', '$nama_file')";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: index.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>