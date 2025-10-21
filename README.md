

Aplikasi Manajemen Pegawai


APlikasi menggunakan XAMPP:


Cara Instalasi Dan Menjalankan Aplikasi



1.  Letakan Folder Proyek
    -   Copy semua file.
    -   Masukkan ke dalam folder htdocs
    -   Pastikan nama foldernya sip.

2.  Buat Database
    - Export menggunakan PHP My ADmin  

3.  Jangan Lupa Folder uploads
    - Di dalam folder sip, buat folder uploads.
    

4.  Jalankan Aplikasinya
   - Akses http://localhost/sip/dashboard.php
    

API
Menggunakan token sederhana
token=abc123

Contoh Alamat URL-nya:

Coba buka alamat-alamat ini di browser (jangan lupa tambah ?token=abc123 di belakangnya).

1.  Buat lihat semua data pegawai:
    http://localhost/sip/api/pegawai?token=abc123

2.  Buat lihat data pegawai tertentu (contoh ID 1):
    http://localhost/sip/api/pegawai/1?token=abc123

3.  Buat lihat data absensi (bisa ditambah filter):
    http://localhost/sip/api/absensi?pegawai_id=1&tanggal=2023-10-26&token=abc123

4.  Buat lihat data kinerja berdasarkan periode:
    http://localhost/sip/api/kinerja?periode=Oktober%202023&token=abc123

Tambahkan .htaccess sudah terlampir di project. pastikan mod_rewrite aktif/

