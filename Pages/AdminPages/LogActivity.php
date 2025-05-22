<?php

include("../../Config/controller.php");

$data_log = select("SELECT * FROM logaktifitas");
  ?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perpustakaan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="../../style/logaktifitas.css">
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

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link fs-4" href="AdminPage.php">Home</a>
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
              <li><a class="dropdown-item" href="TableSiswa.php">Akun Siswa</a></li>
              <li><a class="dropdown-item" href="TablePetugas.php">Akun Petugas</a></li>
              <!-- <li><a class="dropdown-item" href="TableAdmin.php">Akun Admin</a></li> -->
            </ul>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link fs-4" href="#">Log Aktivitas</a> -->
          </li>
        </ul>
      </div>

      <!-- Login Button -->
      </form>
      <button type="button" class="btn btn-outline-warning fs-5" style="color:black"
        onclick="window.location.href='../../index.php'">Log out</button>
    </div>
    </div>
  </nav>


  <div class="kontener" class="bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg"
    style="padding:5em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 3em;">

    <div class="container">
      <h1 style="text-align: center; padding-top: 1em;">Log Aktivitas</h1>

      <br>
      </br>

      <ul class="responsive-table">

        <div class="tipefilt" style="margin-bottom: 1em;">
          <h5 style=" padding-top: 1em;">Filter Log :</h5>
          <!-- filter operasi -->
          <form method="GET" id="filtertipe">
            <!-- filter operasi insert -->
            <input class="cekbok" type="checkbox" name="tipe[]" id="insert" value="insert"
            onchange="document.getElementById('filtertipe').submit();"
            <?= in_array('insert', $_GET['tipe'] ?? []) ? 'checked' : '' ?>>
            <label for="insert">INSERTED</label>

            <!-- filter operasi update -->
            <input class="cekbok" type="checkbox" name="tipe[]" id="update" value="update"
            onchange="document.getElementById('filtertipe').submit();"
            <?= in_array('update', $_GET['tipe'] ?? []) ? 'checked' : '' ?>>
            <label for="update">UPDATED</label>

            <!-- filter operasi delete-->
            <input class="cekbok" type="checkbox" name="tipe[]" id="delete" value="delete"
            onchange="document.getElementById('filtertipe').submit();"
            <?= in_array('delete', $_GET['tipe'] ?? []) ? 'checked' : '' ?>>
            <label for="delete">DELETED</label>
          </form>

        </div>


        <?php $no = 1; ?>
        <li class="table-header">
          <div class="col col-1">Nomor</div>
          <div class="col col-2">Tipe Query</div>
          <div class="col col-3">Username</div>
          <div class="col col-4">Operasi</div>
          <div class="col col-5">Waktu</div>
        </li>

        <?php 
        
          $filterlog=[];

          if(isset($_GET['tipe']) && is_array($_GET['tipe'])) {
            foreach ($data_log as $log) {
              if (in_array($log['tipe'], $_GET['tipe'])){
                $filterlog[] = $log;
              }
            }
          } else {
            $filterlog=$data_log;
          }

        ?>

        <?php foreach ($filterlog as $infolog): ?>
          <li class="table-row">
            <div class="col col-1" data-label="Nomor"><?= $no++; ?></div>
            <div class="col col-2" data-label="Tipe"><?= $infolog['tipe']; ?></div>
            <div class="col col-3" data-label="Username"><?= $infolog['username']; ?></div>
            <div class="col col-4" data-label="Operasi"><?= $infolog['operasi']; ?></div>
            <div class="col col-5" data-label="Waktu"><?= $infolog['waktu']; ?></div>

          </li>
        <?php endforeach; ?>
      </ul>
    </div>


  </div>
  </div>














</body>

</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>