<?php
include 'koneksi.php';
 $id = $_GET['id'];
 $perintah = "DELETE FROM absensi WHERE id = $id";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: absensi.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>