<?php
include "../../config/controller.php";

if (isset($_GET['id']) && isset($_GET['path'])) {
    $id = (int) $_GET['id'];
    $path = (string) $_GET['path'];
    $data_buku = select("SELECT * FROM buku WHERE id='$id'")[0];
    $data_kategori = select("SELECT * FROM kategori");
    if (isset($_POST['ubah'])) {
        if (ubah_infobuku($_POST) > 0) {
            switch($path) {
                case 'admin':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../AdminPages/TableBuku.php?pesan=berhasil");
                    exit;
                case 'petugas':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../PetugasPages/TableBuku.php?pesan=berhasil");
                    exit;
                default:
                    echo "<script>alert('role tidak valid!');</script>";
                    break;      
            }

        }      else{
        echo 'ubah gagal';
        
        } 
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Kategori</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body >
    <div class="kontener" style="background-image: url(../../images/TestBawah3.jpg); background-repeat: no-repeat;
  background-size: cover; width:100vw; height:100vh; opacity:90%;">


        <div class="card bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
            style="padding:3.2em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">
            
            <h1 style="text-align:center">Ubah Kategori</h1>
            <form action="" method="POST">
            <input type="hidden" name="id" value="<?= $data_buku['id']; ?>">
            <label style="color:white;" for="id_kategori">Kategori Buku</label>
                <select class="form-control" name="id_kategori"required>
                    <?php foreach($data_kategori as $kategori): ?>
                        <option value="<?=$kategori['id_kategori']?>"><?=$kategori['nama'];?></option>
                    <?php endforeach;?>
                </select>
                <br>
                <label style="color:#F8F8E1;" for="judul">Judul Buku</label>
                <input class="form-control" type="text" name="judul" value="<?= $data_buku['judul'];?>" required>
                <br>
                <label style="color:#F8F8E1;" for="pengarang">Pengarang</label>
                <input class="form-control" type="text" name="pengarang" value="<?= $data_buku['pengarang'];?>" required>
                <br>
                <label style="color:#F8F8E1;" for="deskripsi">Deskripsi Buku</label>
                <input class="form-control" type="text" name="deskripsi" value="<?= $data_buku['deskripsi'];?>" required>
                <br>
                <label style="color:#;" for="tahun_terbit">Tahun Terbit</label>
                <input class="form-control" type="text" name="tahun_terbit" value="<?= $data_buku['tahun_terbit'];?>" required>
                <br>
                <label style="color:#;" for="jumlah">Jumlah</label>
                <input class="form-control" type="text" name="jumlah" value="<?= $data_buku['jumlah'];?>" required>
                <br>
                <label style="color:#;" for="gambar">Gambar</label>
                <input class="form-control" type="text" name="gambar" value="<?= $data_buku['gambar'];?>" required>
                <br>
                <label style="color:;" for="readtime">Read Time</label>
                <input class="form-control" type="text" name="readtime" value="<?= $data_buku['readtime'];?>" required>
                <br> <br>
                
                <input class="btn btn-outline-dark position-absolute top-90 start-50 translate-middle" type="submit"
                    name="ubah" value="Ubah Info kategori">

            </form>
        </div>

    </div>
</body>
</html>

