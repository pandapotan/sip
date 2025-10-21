<?php
include 'koneksi.php';
 $id = $_GET['id'];
 $cari_foto = "SELECT foto FROM pegawai WHERE id = $id";
 $hasil_cari = $koneksi->query($cari_foto);
if ($hasil_cari->num_rows > 0) {
    $data = $hasil_cari->fetch_assoc();
    $file_foto = 'uploads/' . $data['foto'];
    if (file_exists($file_foto)) {
        unlink($file_foto);
    }
}
 $perintah = "DELETE FROM pegawai WHERE id = $id";
if ($koneksi->query($perintah) === TRUE) {
    header("Location: index.php");
} else {
    echo "Gagal: " . $koneksi->error;
}
 $koneksi->close();
?>