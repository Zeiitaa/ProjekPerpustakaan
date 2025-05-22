<?php
include "../../config/controller.php";

if (isset($_GET['id']) && isset($_GET['role']) ) {
    $id = (int) $_GET['id'];
    $role = (string) $_GET['role'];
    $akuninfo = select("SELECT * FROM kategori WHERE id_kategori='$id'")[0];

    if (isset($_POST['ubah'])) {
        if (ubah_buku($_POST) > 0) {
            switch($role) {
                case 'admin':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../AdminPages/KategoriTable.php?pesan=berhasil");
                    exit;
                case 'petugas':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../PetugasPages/KategoriTable.php?pesan=berhasil");
                    exit;
                default:
                    echo "<script>alert('role tidak valid!');</script>";
                    break;      
            }

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
                <input type="hidden" name="id" value="<?= $akuninfo['id_kategori']; ?>">
                <br>
                <label for="name">Name </label>
                <input class="form-control" type="text" name="nama" value="<?= $akuninfo['nama'];?>">

                
                <br> <br>
                
                <input class="btn btn-outline-dark position-absolute top-90 start-50 translate-middle" type="submit"
                    name="ubah" value="Ubah Info kategori">

            </form>
        </div>

    </div>
</body>
</html>

