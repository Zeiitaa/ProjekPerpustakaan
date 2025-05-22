<?php
include('../../Config/controller.php');
//SQL Menampilkan 
$data_kategori = select("SELECT * FROM kategori");

if (isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil') {
  echo "<script>alert('Ubah berhasil!');</script>";
} else if (isset($_GET['pesantambah']) && $_GET['pesantambah'] == 'tambahberhasil') {
  echo "<script>alert('Tambah berhasil!');</script>";
} else if (isset($_GET['pesanhapus']) && $_GET['pesanhapus'] == 'hapusberhasil') {
  echo "<script>alert('Hapus berhasil!');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kategori</title>
  <!-- <link rel="stylesheet" href="style/style.css"> -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/TableKateg.css">
</head>

<body>

  <!-- Navbar-->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFECDB">
    <div class="container-fluid">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-4" href="../AdminPages/AdminPage.php">Home</a>
        </li>
      </ul>

      <!-- Button Collapse (muncul di media yg lebih kecil ) -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fs-4" href="KategoriTable.php">Kategori</a>
          </li>
          <li class="nav-item">
          <a class="nav-link fs-4" href="TableBuku.php">Buku</a>
        </li>
          <li class="nav-item dropdown fs-4">
            <a class="nav-link dropdown-toggle " href="#" id="navbarDropdownMenuLink" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Kelola Akun
            </a>
            <ul class="dropdown-menu fs-5" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="../AdminPages/TableSiswa.php">Akun Siswa</a></li>
              <li><a class="dropdown-item" href="../AdminPages/TablePetugas.php">Akun Petugas</a></li>
              <!-- <li><a class="dropdown-item" href="../AdminPages/TableAdmin.php">Akun Admin</a></li> -->
            </ul>
          </li>
           <li class="nav-item">
          <!-- <a class="nav-link fs-4" href="LogActivity.php">Log Aktivitas</a> -->
        </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="kontener" class="bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
    style="padding:5em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em; ">

    <div class="container">
      <h1>Data Kategori</h1>
      <button type="button" class="btn btn-warning" style="border-radius:1em;"
        onclick="window.location.href='../Actionpage/tambahkategori.php?role=admin'">Tambah Kategori</button>

      <br> </br>

      <ul class="responsive-table">
        <?php $no = 1; ?>
        <li class="table-header">
          <div class="col col-1">Nomor</div>
          <div class="col col-2">Nama Kategori</div>
          <div class="col col-4">Action Button</div>
        </li>
        <?php foreach ($data_kategori as $kategoriinfo): ?>
          <li class="table-row">
            <div class="col col-1" data-label="Nomor"><?= $no++; ?></div>
            <div class="col col-2" data-label="Nama Kategori"><?= $kategoriinfo['nama']; ?></div>
            <div class="col col-4" data-label="Action Button">

              <button type="button" class="btn btn-outline-warning " style="text-decoration:none;"
                onclick="window.location.href='../Actionpage/ubahkategori.php?id=<?= $kategoriinfo['id_kategori']; ?>&role=admin'">Ubah</button>

              <button type="button" class="btn btn-outline-danger" style="text-decoration:none;"
                onclick="window.location.href='../Actionpage/hapuskategori.php?id=<?= $kategoriinfo['id_kategori']; ?>&role=admin'"
                onclick="return confirm('Yakin kah bang?')">Hapus</style=></button>

            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>

  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>