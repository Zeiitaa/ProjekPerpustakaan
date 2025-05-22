<?php
include "../../config/controller.php";

if (isset($_GET['id']) && isset($_GET['path'])) {
    $id = (int) $_GET['id'];
    $path= (string)$_GET['path'];
    $akuninfo = select("SELECT * FROM logininfo WHERE id='$id'")[0];

    if (isset($_POST['ubah'])) {
        if (ubah_akun($_POST) > 0) {
            switch($path) {
                case 'ASiswa':
                    // cek path untuk redirect ketempat yang benar
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../AdminPages/tableSiswa.php?pesan=berhasil");
                    break;

                case 'APetugas':
                    // Cek path unutk redrect ke file yg sama
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../AdminPages/TablePetugas.php?pesan=berhasil");
                    break;
                case 'PSiswa':
                    // Cek path unutk redrect ke file yg sama
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../PetugasPages/TableSiswa.php?pesan=berhasil");
                    break;
                default:
                    echo "<script>alert('role tidak valid!');</script>";
                    break;      
            }
        } else {
            echo "<script>
            alert('Data Gagal Di Ubah');
            document.location.href='../../login.php';
        </script>";
        }
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Akun</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body >
    <div class="kontener" style="background-image: url(../../images/depan5.png); background-repeat: no-repeat;
  background-size: cover; width:100vw; height:100vh; opacity:90%;">


        <div class="card bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
            style="padding:3.2em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">
            
            <h1 style="text-align:center">Ubah Info Akun</h1>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $akuninfo['id']; ?>">
                <br>
                <label for="name">Name </label>
                <input class="form-control" type="text" name="name" value="<?= $akuninfo['name'];?>">
                <br>    
                <label style="color:black;" for="username">Username</label>
                <input class="form-control" type="text" name="username"  value="<?= $akuninfo['username']; ?>">
                <br>
                <label style="color:black;" for="password">Password</label>
                <input class="form-control" type="text" name="password"  value="<?= $akuninfo['password']; ?>">
                <br>
                <label style="color:black;" for="level">Level</label>
                <input class="form-control" type="text" name="level"  value="<?= $akuninfo['level']; ?>" readonly>
                <br>
                <label style="color:black;" for="status">Status</label>
                <input class="form-control" type="text" name="status"  value="<?= $akuninfo['status']; ?>" readonly>
                
                <br> <br>
                
                <input class="btn btn-outline-light position-absolute top-90 start-50 translate-middle" type="submit"
                    name="ubah" value="Ubah Login">

            </form>
        </div>

    </div>
</body>
</html>

