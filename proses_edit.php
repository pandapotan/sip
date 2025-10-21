<?php
include 'koneksi.php';
 $id = $_POST['id'];
 $perintah = "UPDATE pegawai SET nama='$_POST[nama]', nip='$_POST[nip]', jabatan='$_POST[jabatan]', unit_kerja='$_POST[unit_kerja]', status_kepegawaian='$_POST[status_kepegawaian]' WHERE id=$id";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: index.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>