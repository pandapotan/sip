<?php
include 'koneksi.php';
 $id = $_GET['id'];
 $perintah = "DELETE FROM kinerja WHERE id = $id";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: kinerja.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>