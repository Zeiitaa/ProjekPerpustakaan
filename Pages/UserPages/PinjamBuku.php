<?php 
// Hubungkan ke config
include('../../Config/controller.php');
// Query Ambil Data dari database
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $bukuinfo = select("SELECT * FROM buku WHERE id='$id'")[0];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pinjam Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/stylePinjam.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
    integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>
    
<nav class="navbar navbar-expand-lg navbar-light fixed-top " style="background-color: #FFECDB">
    <div class="container-fluid">
      <a class="home nav-link fs-3" href="Siswa.php">Home</a>

      <!-- Button Collapse (muncul di media yg lebih kecil ) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="navbar-brand fs-4" href="#">House of Books</a>
          </li>
        </ul>
      </div>

       <!-- Search Button -->
       <form action="" method="GET" class="d-flex" id="cari">
        <input class="search form-control me-4 fs-5" style="width: 20vw;" name="judul" type="search" placeholder="Search"
          aria-label="Search" onchange="document.getElementById('cari').submit();"
          value="<?= isset($_GET['judul']) ? htmlspecialchars($_GET['judul']) : '' ?>" >

        <!-- Login Button -->
      </form>
      <button type="button" class="Login btn btn-outline-warning fs-5" style="color:black"
        onclick="window.location.href='../../Login.php'">Log out</button>
    </div>
  </nav>

    <!-- Kartu Besar Tengah -->
    <div class="Image" style="padding-top: 4em;">
    <div class="kartu">
      <!-- <img src="images/Test6.png"> -->
    </div>

  </div>

</body>
</html>