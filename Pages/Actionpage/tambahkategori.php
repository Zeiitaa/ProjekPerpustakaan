<?php
include "../../config/controller.php";
if (isset($_POST['tambah']) && isset($_GET['role'])) {
    $role = (string) $_GET['role'];
    if (create_buku($_POST) > 0) {
        switch($role) {
            case 'admin':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../AdminPages/KategoriTable.php?pesantambah=tambahberhasil");
                exit;
            case 'petugas':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../PetugasPages/KategoriTable.php?pesantambah=tambahberhasil");
                exit;
            default:
                echo "<script>alert('status tidak valid!');</script>";
                break;      
        }
    } else {
        switch($role) {
            case 'admin':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../AdminPages/KategoriTable.php?pesan=gagal");
                exit;
            case 'petugas':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../PetugasPages/KategoriTable.php?pesan=gagal");
                exit;
            default:
                echo "<script>alert('status tidak valid!');</script>";
                break; 
            }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Kategori</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="kontener" style="background-image: url(../../images/TestBawah3.jpg); background-repeat: no-repeat;
  background-size: cover; width:100vw; height:100vh; opacity:90%;">

        <div class="card bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
            style="padding:2em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 2em; padding: 3em 5em;">

            <h1 style="text-align:center">Tambah <BR> Kategori Baru</h1>
            <form action="" method="POST"><br>
                <label style="color:white;" for="nama">Nama Kategori Baru</label>
                <input class="form-control" type="text" name="nama" required>
                <br>

                <br>
                <br>
                <br>
                <input class="btn btn-dark position-absolute top-90 start-50 translate-middle" type="submit"
                    name="tambah" value="Tambah Kategori Baru">
            </form>
        </div>
    </div>

</body>

</html>