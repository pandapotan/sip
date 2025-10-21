<?php
header('Content-Type: application/json');

include 'koneksi.php';

 $token_rahasia = 'abc123';

if (!isset($_GET['token']) || $_GET['token'] !== $token_rahasia) {
    http_response_code(401);
    echo json_encode(['pesan' => 'Token Salah']);
    exit();
}

 $request_url = isset($_GET['request']) ? rtrim($_GET['request'], '/') : '';
 $url_parts = explode('/', $request_url);

 $resource = $url_parts[0];

switch ($resource) {
    case 'pegawai':
        if (isset($url_parts[1])) {
          
            $id = (int)$url_parts[1];
            $perintah = "SELECT * FROM pegawai WHERE id = $id";
            $hasil = $koneksi->query($perintah);
            if ($hasil->num_rows > 0) {
                echo json_encode($hasil->fetch_assoc());
            } else {
                http_response_code(404);
                echo json_encode(['pesan' => 'Pegawai tidak ditemukan']);
            }
        } else {
          
            $perintah = "SELECT id, nip, nama, jabatan, unit_kerja, status_kepegawaian FROM pegawai ORDER BY id DESC";
            $hasil = $koneksi->query($perintah);
            echo json_encode($hasil->fetch_all(MYSQLI_ASSOC));
        }
        break;

    case 'absensi':
        
        $pegawai_id = isset($_GET['pegawai_id']) ? $_GET['pegawai_id'] : '';
        $tanggal = isset($_GET['tanggal']) ? $_GET['tanggal'] : '';

        $sql = "SELECT a.*, p.nama, p.nip FROM absensi a JOIN pegawai p ON a.pegawai_id = p.id WHERE 1=1";
        if (!empty($pegawai_id)) {
            $sql .= " AND a.pegawai_id = $pegawai_id";
        }
        if (!empty($tanggal)) {
            $sql .= " AND a.tanggal = '$tanggal'";
        }
        $sql .= " ORDER BY a.tanggal DESC";

        $hasil = $koneksi->query($sql);
        echo json_encode($hasil->fetch_all(MYSQLI_ASSOC));
        break;

    case 'kinerja':
        
        $periode = isset($_GET['periode']) ? $_GET['periode'] : '';

        $sql = "SELECT k.*, p.nama, p.nip FROM kinerja k JOIN pegawai p ON k.pegawai_id = p.id WHERE 1=1";
        if (!empty($periode)) {
            $sql .= " AND k.periode = '$periode'";
        }
        $sql .= " ORDER BY k.periode DESC";

        $hasil = $koneksi->query($sql);
        echo json_encode($hasil->fetch_all(MYSQLI_ASSOC));
        break;

    default:
        http_response_code(404);
        echo json_encode(['pesan' => 'Endpoint tidak ditemukan']);
        break;
}

 $koneksi->close();
?>