<?php
include ('../../Config/controller.php') ;
//SQL Menampilkan 
$data_akun = select("SELECT * FROM logininfo WHERE status='siswa'") ;
// untuk memberi alert dari redirect  
if (isset($_GET['Register']) && $_GET['Register']=='tambahberhasil'){
  echo "<script>alert('Tambah berhasil!');</script>";
}else if (isset($_GET['pesan']) && $_GET['pesan'] == 'berhasil') {
  echo "<script>alert('Ubah berhasil!');</script>";
}else if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapusberhasil') {
echo "<script>alert('Hapus berhasil!');</script>";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../style/TableKateg.css">
</head>
<body >
<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFECDB">
  <div class="container-fluid">
    
  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-4" href="PetugasPage.php">Home</a>
        </li>
  </ul>
    
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
          <a class="nav-link fs-4" href="TableBuku.php">Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link fs-4" href="TableSiswa.php">Kelola Akun Siswa</a>
        </li>
        </ul>
    </div>

  </div>
</nav>

    <div class="kontener" class="bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
    style="padding:5em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">

    <div class="container">
      <h1>DATA AKUN SISWA</h1>
      <button type="button" class="btn btn-warning" style="border-radius:1em;"
      onclick="window.location.href='Registrasi.php?path=PSiswa'">Register</button>

      <br> </br>

      <ul class="responsive-table">
        <?php $no = 1; ?>
        <li class="table-header">
          <div class="col col-1">Nomor</div>
          <div class="col col-2">Nama</div>
          <div class="col col-3">Username</div>
          <div class="col col-4">Password</div>
          <div class="col col-5">Level</div>
          <div class="col col-6">Status</div>
          <div class="col col-7">Action Button</div>
        </li>
        <?php foreach ($data_akun as $akuninfo): ?>
          <li class="table-row">
            <div class="col col-1" data-label="Nomor"><?= $no++; ?></div>
            <div class="col col-2" data-label="Nama"><?= $akuninfo['name']; ?></div>
            <div class="col col-3" data-label="Username"><?= $akuninfo['username']; ?></div>
            <div class="col col-4" data-label="Password"><?= $akuninfo['password']; ?></div>
            <div class="col col-5" data-label="Level"><?= $akuninfo['level']; ?></div>
            <div class="col col-6" data-label="Status"><?= $akuninfo['status']; ?></div>
            <div class="col col-7" data-label="Action Button">

              <button type="button" class="btn btn-outline-warning " style="text-decoration:none;"
                onclick="window.location.href='../Actionpage/ubahakun.php?id=<?= $akuninfo['id']; ?>&path=PSiswa'">Ubah</button>
              <button type="button" class="btn btn-outline-danger" style="text-decoration:none;"
                onclick="window.location.href='../Actionpage/hapusakun.php?id=<?= $akuninfo['id']; ?>&path=PSiswa'"
                onclick="return confirm('Yakin kah bang?')">Hapus</style=></button>


            </div>
          </li>
        <?php endforeach; ?>
      </ul>
    </div>


  </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>