<?php
session_start();
include ('../../Config/controller.php') ;
//Query Ambil data 
$data_akun = select("SELECT * FROM kategori") ; 

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
    <link rel="stylesheet" href="../../style/styleAdmin.css">
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
          <a class="kategori nav-link fs-4" href="KategoriTable.php?id=<?=$id?>">Kategori</a>
        </li>
        <li class="nav-item">
          <a class="buku nav-link fs-4" href="TableBuku.php">Buku</a>
        </li>
        <li class="nav-item dropdown fs-4">
          <a class="nav-link dropdown-toggle akun " href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Kelola akun
          </a>
          <ul class="dropdown-menu fs-5" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="TableSiswa.php?id=<?=$id?>">Akun Siswa</a></li>
            <li><a class="dropdown-item" href="TablePetugas.php?id=<?=$id?>">Akun Petugas</a></li>
            <!-- <li><a class="dropdown-item" href="TableAdmin.php">Akun Admin</a></li> -->
          </ul>
        </li>
        <li class="nav-item">
          <!-- <a class="nav-link fs-4" href="LogActivity.php">Log Aktivitas</a> -->
        </li>
        </ul>
    </div>
    
    <!-- Login Button -->
      </form>
      <button type="button" class="btn btn-outline-warning fs-5" style="color:black" onclick="window.location.href='../../index.php'">Log out</button>
  </div>
</nav>

<!-- Text Welcome -->
<h1 style="text-align:center; padding-top: 3em;" >Welcome to The Akademiya System, <?php echo htmlspecialchars($nama_user) ?>!</h1>

<div id="alertPinjam" class="alert alert-warning alert-dismissible fade show d-none mt-2" role="alert">
  <strong>Belum dibuat bang!</strong> <br>Buat dulu bang
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

<div class="kontener"  class="bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg" 
    style="padding:5em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">

  <!-- Gambar Depan -->
<div class="Image">
<div class="kartu">
  <!-- <img src="../../images/Test6.png"> -->

  <div class="log" onclick="window.location.href='LogActivity.php?id=<?=$id?>'">
    <div class="isiact">
    <svg style="" xmlns="http://www.w3.org/2000/svg" width="16vw" height="16vh" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022zm2.004.45a7 7 0 0 0-.985-.299l.219-.976q.576.129 1.126.342zm1.37.71a7 7 0 0 0-.439-.27l.493-.87a8 8 0 0 1 .979.654l-.615.789a7 7 0 0 0-.418-.302zm1.834 1.79a7 7 0 0 0-.653-.796l.724-.69q.406.429.747.91zm.744 1.352a7 7 0 0 0-.214-.468l.893-.45a8 8 0 0 1 .45 1.088l-.95.313a7 7 0 0 0-.179-.483m.53 2.507a7 7 0 0 0-.1-1.025l.985-.17q.1.58.116 1.17zm-.131 1.538q.05-.254.081-.51l.993.123a8 8 0 0 1-.23 1.155l-.964-.267q.069-.247.12-.501m-.952 2.379q.276-.436.486-.908l.914.405q-.24.54-.555 1.038zm-.964 1.205q.183-.183.35-.378l.758.653a8 8 0 0 1-.401.432z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5"/>
</svg>
    <h2 style="text-align:center; margin-top:0.7em">Log Aktifitas</h2>
  </div>
  </div>

  <div class="pinjam" onclick="showPinjamAlert()">
    <div class="isipnjm">
    <svg xmlns="http://www.w3.org/2000/svg" width="16vw" height="16vh" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5m8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0z"/>
</svg>
    <h2 style="text-align:center; margin-top:0.7em">Log Peminjaman Buku</h2>
    </div>
  </div>

<!-- <div class="ap">
    <h1 style="color:white;">apa</h1>
  </div>

</div>
</div> -->


</div>

</body>



</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
  function showPinjamAlert() {
    const alertBox = document.getElementById("alertPinjam");
    alertBox.classList.remove("d-none"); // tampilkan alert
  }
</script>