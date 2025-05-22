<?php
include '../../config/controller.php';
// MENERIMA ROLE AKUN YANG DIKIRIM
if (isset($_GET['path'])) {
    $path= (string)$_GET['path'];
}

// MENERIMA ID LOGIN YANG DIPILIH UNTUK DIHAPUS
$id = (int)$_GET['id'];

//kondisi ketika tombol hapus di tekan
if(hapus_infobuku($id) > 0) {

    switch($path) {
        case 'admin':
            // cek path untuk kemabli ke file sebelumnya
            header("Location:../AdminPages/TableBuku.php?pesan=hapusberhasil");
            break;

        case 'petugas':
            header("Location:../PetugasPages/TableBuku.php?pesan=hapusberhasil");
            break;

        default:
            echo "<script>alert('path kembali tidak valid!');</script>";
            break;      
    }        
} else {
    
    echo "<script>
        alert('Data GAGAL Di Hapus');
        document.location.href='PetugasTable.php';
</script>";
}

?>