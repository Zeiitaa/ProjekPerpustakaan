<?php
session_start();
include ('../../Config/controller.php') ;
//Query Ambil data 
$data_akun = select("SELECT * FROM kategori LIMIT 5") ; 

//apakah ada session?
if (!isset($_SESSION['id'])) {
  header("Location:../../index.php");
  exit;
}

$id = $_SESSION['id'];
$nama_user = $_SESSION['username'];

// mengambil id dari url
if (isset($_GET['id'])){
  $id = (int) $_GET['id'];
  $akuninfo = select("SELECT * FROM logininfo WHERE id='$id'")[0];
  // $nama_user = $akuninfo['name']; 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/styleIndex.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFECDB">
  <div class="container-fluid">
    <a class="navbar-brand fs-3" href="#">Home</a>
    
    <!-- Button Collapse (muncul di media yg lebih kecil ) -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-4" href="KategoriTable.php">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4" href="TableBuku.php?path=petugas">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4" href="TableSiswa.php">Kelola Akun Siswa</a>
        </li>
        </ul>
    </div>
    
    <!-- Login Button -->
      </form>
      <button type="button" class="btn btn-outline-warning fs-5" style="color:black" onclick="window.location.href='../../index.php'">Log out</button>
  </div>
</nav>

<!-- Text Welcome -->
<h1 style="text-align:center; padding-top: 3em;" >Welcome Back to Akademiya System, <?php echo htmlspecialchars($nama_user) ?>!</h1>

<div class="kontener"  class="bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg" 
    style="padding:5em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">

<!-- Gambar Depan -->
<div class="Image">
<div class="kartu">
</div>
</div>

</div>

</div>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>