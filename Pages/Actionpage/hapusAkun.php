<?php
include '../../config/controller.php';
// MENERIMA ROLE AKUN YANG DIKIRIM
if (isset($_GET['path'])) {
    $path = (string) $_GET['path'];
}

// MENERIMA ID LOGIN YANG DIPILIH UNTUK DIHAPUS
$id = (int) $_GET['id'];

//kondisi ketika tombol hapus di tekan
if (hapus_akun($id) > 0) {

    switch ($path) {
        case 'ASiswa':
            // cek path untuk redirect ketempat yang benar
            // Redirect ke halaman lain, misalnya dashboard
            header("Location:../AdminPages/tableSiswa.php?pesan=hapusberhasil");
            break;

        case 'APetugas':
            // Cek path unutk redrect ke file yg sama
            // Redirect ke halaman lain, misalnya dashboard
            header("Location:../AdminPages/TablePetugas.php?pesan=hapusberhasil");
            break;
        case 'PSiswa':
            // Cek path unutk redrect ke file yg sama
            // Redirect ke halaman lain, misalnya dashboard
            header("Location:../PetugasPages/TableSiswa.php?pesan=hapusberhasil");
            break;
        default:
            echo "<script>alert('path tidak valid!');</script>";
            break;
    }
} else {
    echo "<script>
            alert('Data Gagal Di Ubah');
            document.location.href='../../login.php';
        </script>";
}

?>