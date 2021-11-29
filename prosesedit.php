<?php

include("config.php");
// cek apakah tombol daftar sudah diklik atau blum?
if (isset($_POST['daftar'])) {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jk = $_POST['jenis_kelamin'];
        $sekolah = $_POST['sekolah_asal'];

        // buat query
        $q = "UPDATE calonsiswa SET nama='$nama', alamat='$alamat', jenis_kelamin='$jk', sekolah_asal='$sekolah' WHERE id = '$id'";
        $query = pg_query($q);
        // apakah query simpan berhasil?
        if ($query == TRUE) {
            // kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: daftarsiswa.php?status=sukses&action=edit');
        } else {
            // kalau gagal alihkan ke halaman indek.ph dengan status=gagal
            header('Location: daftarsiswa.php?status=gagal&action=edit');
        }
    }

    // ambil data dari formulir



} else {
    die("Akses dilarang...");
}
