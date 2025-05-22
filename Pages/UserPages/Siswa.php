<?php
session_start();
include('../../Config/controller.php');
//Query Ambil data 
$data_buku = select("SELECT * FROM buku LIMIT 4");

//apakah ada session?
if (!isset($_SESSION['id'])) {
  header("Location:../../index.php");
  exit;
}

$id = $_SESSION['id'];
$nama_user = $_SESSION['username'];

// mengambil id dari url
if (isset($_GET['id'])) {
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
  <title>Perpustakaan Akademiya <?php echo htmlspecialchars($nama_user) ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/styleIndex.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
    rel="stylesheet">

</head>

<body>

  <!-- Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFECDB">
    <div class="container-fluid">
      <a class="navbar-brand fs-3" href="#">Home</a>

      <!-- Button Collapse (muncul di media yg lebih kecil ) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fs-4" href="KatalogBuku.php">House of Books</a>
          </li>
        </ul>
      </div>

 <!-- Search Button -->
      <form action="" method="GET" class="d-flex" id="cari">
        <input class="search form-control me-4 fs-5" style="width: 20vw;" name="judul" type="search" placeholder="Search"
          aria-label="Search" onchange="document.getElementById('cari').submit();"
          value="<?= isset($_GET['judul']) ? htmlspecialchars($_GET['judul']) : '' ?>" >

          <?php
      // Ngecek apakah judul ada pada url 
      if (isset($_GET['judul']) && $_GET['judul'] == '') {
        $data_buku = select("SELECT * FROM buku LIMIT 4");
      }else  if (isset($_GET['judul'])) {
          // jika ada, judul tersebut akan di masukan kedalam variable cari
          $cari = $_GET['judul'];
          // variabel cari tadi akan digunakan untuk mencari judul berdasarkan yang ada di url
          $data_buku = select("SELECT * FROM buku WHERE judul LIKE '%$cari%'");
      }
      ?>


        <!-- Login Button -->
      </form>
      <button type="button" class="btn btn-outline-warning fs-5" style="color:black"
        onclick="window.location.href='../../Login.php'">Log out</button>
    </div>
  </nav>

  <!-- Text Welcome -->
  <h1 style="text-align:center; padding-top: 3em; padding-bottom: 1em;">Welcome Back to Akademiya,
    <?php echo htmlspecialchars($nama_user) ?>!</h1>

  <!-- Gambar Depan -->
  <div class="Image">
    <div class="kartu">
      <img src="../../images/Test6.png">
    </div>
  </div>
  <!-- Text kecil -->
  <h6 style="text-align:center; padding: 2em;">Akademiya is an online library that easy to access by everyone</h6>

  <!-- Card Per Buku -->
  <div class="kotak">

    <!-- Membuat Card sebanyak data yang ada di database -->
    <?php foreach ($data_buku as $bukuinfo): ?>

      <article class="card card--1">
        <div class="card__info-hover">
          <svg class="card__like" viewBox="0 0 24 24">
            <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,...Z" />
          </svg>

          <div class="card__clock-info">
            <svg class="card__clock" viewBox="0 0 24 24">
              <path d="M12,20A7,7..." />
            </svg>
            <span class="card__time">13 mins</span>
          </div>
        </div>

        <!-- Mengambil gambar dari database sesuai id(deskripsi,judul,gambar) -->
        <div class="card__img" style="background-image: url('../../<?= $bukuinfo['gambar']; ?>');"></div>
        <a href="#" class="card_link">
          <div class="card__img--hover" style="background-image: url('../../<?= $bukuinfo['gambar']; ?>');"></div>
        </a>

        <!-- Info Buku -->
        <div class="card__info">
          <!-- Mengambil Deskripsi dari database -->
          <span class="card__category"><?= $bukuinfo['deskripsi']; ?></span>
          <!-- Mengambil Judul dari database -->
          <h2 class="card__title"><?= $bukuinfo['judul']; ?></h2>
          <div class="card__buttons">
            <a href="../buku/detailbuku.php?id=<?= $bukuinfo['id']; ?>&path=SPage" class="btn-info">Info Buku</a>
            <a href="#.php" class="btn-warning">Pinjam</a>
          </div>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <!-- Redirect ke KategoriBuku -->
  <h5><a class="kateg" href="KatalogBuku.php">Selengkapnya -></a></h5>

  <!-- Gambar Join  -->
  <!-- <div class="Image bawah">
    <div class="kartu bawah">
      <h3 style="text-align:center; color: white;"> Ayo Join Akademiya Sekarang</h3>
      <button type="button" class="btn btn-warning fs-3" style="margin:1em"
        onclick="window.location.href='../../login.php'">Login</button>
    </div>
  </div> -->

  <!-- FOOTER -->
  <div class="footer">
    <!-- <img style="text-align: center" src="../images/Instahytaam.png" alt=""> -->
    <!-- Link Social Media/Contact -->
    <!-- <h5><a style="text-align: center; text-decoration:none; color: black" href="https://www.instagram.com/dkaahitra/">Dkaahitra</a></h5> -->

    <div class="footer">
      <h3>Contact Me Here:</h3>

      <!-- logo instagram -->
      <ul class="logo">
        <li style="--i:#a955ff;--j:#ea51ff">
          <span class="icon"><ion-icon name="logo-instagram"></ion-icon></span>
          <span class="title"><a style="text-decoration: none; color:white;"
              href="https://www.instagram.com/dkaahitra/">Dkaahitra</a></span>
        </li>

        <!-- logo Email -->
        <li style="--i:#FF8282;--j:#F7374F">
          <span class="icon"><ion-icon name="mail"></ion-icon></span>
          <span class="title"><a style="text-decoration:none; color:white;" href="mailto:galihisya8@gmail.com">Email
              Me!</a></span>
        </li>
      </ul>

      <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
      <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    </div>

  </div>


</body>
<!-- Bootstrap 5 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</html>