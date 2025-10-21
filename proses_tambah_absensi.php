<?php
include 'koneksi.php';
 $perintah = "INSERT INTO absensi (pegawai_id, tanggal, waktu_masuk, waktu_pulang, status) VALUES ('$_POST[pegawai_id]', '$_POST[tanggal]', '$_POST[waktu_masuk]', '$_POST[waktu_pulang]', '$_POST[status]')";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: absensi.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>