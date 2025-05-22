<?php
include '../../config/controller.php';
// MEnerima role dari url
if (isset($_GET['role'])) {
    $role= (string) $_GET['role'];
}

// MENERIMA ID LOGIN YANG DIPILIH UNTUK DIHAPUS
$id = (int)$_GET['id'];

//kondisi ketika tombol hapus di tekan
if(hapus_buku($id) > 0) {
    switch($role) {
        case 'admin':
            // Redirect ke halaman lain, misalnya dashboard
            header("Location:../AdminPages/KategoriTable.php?pesanhapus=hapusberhasil");
            exit;
        case 'petugas':
            // Redirect ke halaman lain, misalnya dashboard
            header("Location:../PetugasPages/KategoriTable.php?pesanhapus=hapusberhasil");
            exit;
        default:
            echo "<script>alert('status tidak valid!');</script>";
            break;      
    }
        
} else {
    
    echo "<script>
        alert('Data GAGAL Di Hapus');
        document.location.href='KategoriTable.php';
</script>";
}

?>