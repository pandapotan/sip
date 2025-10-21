<?php
include 'koneksi.php';
 $perintah = "INSERT INTO kinerja (pegawai_id, periode, deskripsi, nilai_kinerja) VALUES ('$_POST[pegawai_id]', '$_POST[periode]', '$_POST[deskripsi]', '$_POST[nilai_kinerja]')";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: kinerja.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>