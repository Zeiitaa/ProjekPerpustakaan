<?php
// Hubungkan ke config
include('../../Config/controller.php');
// Query Ambil Data dari database
if (isset($_GET['id']) && isset($_GET['id'])) {
  $id = (int) $_GET['id'];
  $data_buku = select("SELECT buku.*, kategori.nama AS nama_kategori FROM buku 
                     JOIN kategori ON buku.id_kategori = kategori.id_kategori WHERE id='$id'");
  // $bukuinfo = select("SELECT * FROM buku WHERE id='$id'")[0];
}

if (isset($_GET['path']) && $_GET['path'] == 'SPage') {
  // $redirect = (string)$_GET['path'];
  $balik = "../UserPages/Siswa.php";
  $home = "../UserPages/Siswa.php";
} else if (isset($_GET['path']) && $_GET['path'] == 'SCat') {
  // $redirect = (string) $_GET['path'];
  $balik = "../UserPages/KatalogBuku.php";
  $home = "../UserPages/Siswa.php";
} else if (isset($_GET['path']) && $_GET['path'] == 'IPage') {
  $balik = "../../Index.php";
  $home = "../../Index.php";
} else if (isset($_GET['path']) && $_GET['path'] == 'ICat') {
  $balik = "../../GuestCatalog.php";
  $home = "../../Index.php";
} else {
  $balik = "../../Index.php";
  $home = "../../Index.php";
}

if ($data_buku && count($data_buku) > 0) {
  $bukuinfo = $data_buku[0];
} else {
  echo "Data buku tidak ditemukan.";
  exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail buku</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/detailbuku.css">
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
      <a class="home nav-link fs-3" href="<?= htmlspecialchars($home) ?>">Home</a>

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
    </div>
  </nav>
  <!-- tombol kembali ke halaman yg sesuai -->
  <div class="kembali">
    <div class="card__buttons">
      <h4><a href="<?= htmlspecialchars($balik) ?>" class="btn bek"
          style="z-index: 999; position: relative; background-color: #FFECDB; color: black;">Kembali</a></h4>
    </div>
  </div>



  <!-- Kartu Besar Tengah -->
  <div class="Image" style="padding-top: 7em;">
    <div class="kartu">

      <div class="tmptgmbr" style="background-image: url('../../<?= htmlspecialchars($bukuinfo['gambar']); ?>');"></div>

      <!-- Text -->
      <div class="texttext">
        <h2> Judul Buku : <?= htmlspecialchars($bukuinfo['judul']); ?> </h2>
        <h4> Pengarang : <?= htmlspecialchars($bukuinfo['pengarang']); ?> </h4>
        <h5> Deskripsi : <?= htmlspecialchars($bukuinfo['deskripsi']); ?> </h5>
        <h5> Tahun Terbit : <?= htmlspecialchars($bukuinfo['tahun_terbit']); ?></h5>
        <h5> Kategori Buku : <?= htmlspecialchars($bukuinfo['nama_kategori']); ?></h5>
        <h5> Perkiraan Waktu Baca : <?= htmlspecialchars($bukuinfo['readtime']); ?></h5>
        <h5> Stok : <?= htmlspecialchars($bukuinfo['jumlah']); ?></h5>

        <div class="pinjam">
          <div class="card__buttons">
            <h4><a href="#" class="btn btn-dark pinjam"
                style="z-index: 999; position: relative;">Pinjam</a></h4>
          </div>
        </div>
      </div>
    </div>

  </div>

</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>