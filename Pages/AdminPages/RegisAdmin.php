<?php
include "../../config/controller.php";
if (isset($_POST['tambah'])&& isset($_GET['path'])) {
    $path = (string)$_GET['path'];
    if (create_akun($_POST) > 0) {
        switch($path) {
            case 'ASiswa':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../AdminPages/TableSiswa.php?Register=tambahberhasil");
                exit;
            case 'APetugas':
                // Redirect ke halaman lain, misalnya dashboard
                header("Location:../AdminPages/TablePetugas.php?Register=tambahberhasil");
                exit;
            case 'PSiswa':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../PetugasPages/TableSiswa.php?Register=tambahberhasil");
                    exit;
            default:
                echo "<script>alert('status tidak valid!');</script>";
                break;      
        }
    } else {
        echo "<script>
            alert('Data Gagal Ditambahkan');
            document.location.href='../tambahlogin.php';
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="kontener" style="background-image: url(../../images/depan5.png); background-repeat: no-repeat;
  background-size: cover; width:100vw; height:100vh; opacity:100%;">

        <div class="card bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
            style="padding:2em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 2em; padding: 3em 5em;">

            <h1 style="text-align:center; color:black;">Tambah Akun</h1>
            <form action="" method="POST"><br>
                <label style="color:black;" for="name">Name</label>
                <input class="form-control" type="text" name="name" required>
                <br>
                <label style="color:black;" for="username">Username</label>
                <input class="form-control" type="text" name="username" required>
                <br>
                <label style="color:black;" for="password">Password</label>
                <input class="form-control" type="password" name="password" required>
                <br>
                

                
                <label style="color:black;" for="level">Level</label>
                <input class="form-control" type="text" name="level" required style="padding:5px 30px">
                <br>
                <label style="color:black;" for="status">Status</label>
                <input class="form-control" type="text" name="status" required>
                <br>
                

                <!-- <a href='../../Login.php' style="color:Black; text-decoration: none;">Sudah Punya Akun? Login</a> -->
                <br>
                <br>
                <br>
                <input class="btn btn-dark position-absolute top-90 start-50 translate-middle" type="submit"
                    name="tambah" value="Tambah Login">
            </form>
        </div>
    </div>

</body>

</html>