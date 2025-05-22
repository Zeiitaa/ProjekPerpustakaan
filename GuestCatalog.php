<?php
include('Config/controller.php');

// Ambil semua kategori
$data_kateg = select("SELECT * FROM kategori");

// Ambil semua buku + nama kategori
$data_buku = select("SELECT buku.*, kategori.nama AS nama_kategori FROM buku 
                     JOIN kategori ON buku.id_kategori = kategori.id_kategori");

// Filter berdasarkan pencarian judul
if (isset($_GET['judul'])) {
  $cari = $_GET['judul'];
  $data_buku = select("SELECT buku.*, kategori.nama AS nama_kategori FROM buku 
                         JOIN kategori ON buku.id_kategori = kategori.id_kategori 
                         WHERE buku.judul LIKE '%$cari%'");
}

// Filter berdasarkan kategori (checkbox)
if (isset($_GET['kategori']) && is_array($_GET['kategori'])) {
  // Escape nilai input
  $kategori_terpilih = array_map('htmlspecialchars', $_GET['kategori']);
  // Buat string kategori yang aman untuk SQL
  $kategori_str = "'" . implode("','", $kategori_terpilih) . "'";
  // Query filter
  $data_buku = select("SELECT buku.*, kategori.nama AS nama_kategori FROM buku 
                         JOIN kategori ON buku.id_kategori = kategori.id_kategori 
                         WHERE kategori.nama IN ($kategori_str)");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>House of Books</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="style/styleBuku.css" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #FFECDB">
    <div class="container-fluid">
      <a class="home nav-link fs-3" href="Index.php">Home</a>
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

      <!-- Search Form -->
      <form action="" method="GET" class="d-flex" id="cari">
        <input class="form-control me-4 fs-5" style="width: 20vw;" name="judul" type="search" placeholder="Search"
          aria-label="Search" onchange="document.getElementById('cari').submit();"
          value="<?= isset($_GET['judul']) ? htmlspecialchars($_GET['judul']) : '' ?>">
      </form>

      <!-- Login Button -->
      <button type="button" class="Login btn btn-warning fs-5" onclick="window.location.href='Login.php'">Login</button>
    </div>
  </nav>

  <!-- Konten -->
  <div class="ujungin">
    <div class="filterbuku">
      <div class="kartufilter">
        <h3 style="text-align:center; padding: 1em;">Pilihan Kategori:</h3><br>
        <div class="filtbutton">
          <form method="GET" id="filterForm">
            <?php foreach ($data_kateg as $kategori): ?>
              <div class="form-check">
                <input class="cekbok form-check-input fs-4" type="checkbox" name="kategori[]"
                  value="<?= htmlspecialchars($kategori['nama']); ?>" id="kategori<?= $kategori['id_kategori']; ?>"
                  onchange="document.getElementById('filterForm').submit();" <?= (isset($_GET['kategori']) && in_array($kategori['nama'], $_GET['kategori'])) ? 'checked' : '' ?>>
                <label class="kat form-check-label fs-5" for="kategori<?= $kategori['id_kategori']; ?>">
                  <?= htmlspecialchars($kategori['nama']); ?>
                </label>
              </div><br>
            <?php endforeach; ?>
          </form>
        </div>
      </div>
    </div>

    <div class="kontener">
      <div class="kotak">
        <?php if (!empty($data_buku)): ?>
          <?php foreach ($data_buku as $bukuinfo): ?>
            <article class="card card--1">
              <div class="card__info-hover">
                <svg class="card__like" viewBox="0 0 24 24">
                  <path fill="#000000" d="M12.1,18.55L12,18.65...Z" />
                </svg>
                <div class="card__clock-info">
                  <svg class="card__clock" viewBox="0 0 24 24">
                    <path d="M12,20A7,7..." />
                  </svg>
                  <span class="card__time"><?= htmlspecialchars($bukuinfo['readtime']); ?></span>
                </div>
              </div>

              <div class="card__img" style="background-image: url('<?= htmlspecialchars($bukuinfo['gambar']); ?>');"></div>
              <a href="#" class="card_link">
                <div class="card__img--hover"
                  style="background-image: url('<?= htmlspecialchars($bukuinfo['gambar']); ?>');"></div>
              </a>
              <div class="card__info">
                <h2 class="card__title"><?= htmlspecialchars($bukuinfo['judul']); ?></h2>
                <span class="card__category"><?= htmlspecialchars($bukuinfo['nama_kategori']); ?></span>
                <div class="card__buttons">
                  <a href="Pages/Buku/DetailBuku.php?id=<?= $bukuinfo['id']?>&path=ICat" class="btn-info">Info Buku</a>
                  <a href="Login.php" class="btn-warning">Login Untuk Meminjam</a>
                </div>
              </div>
            </article>
          <?php endforeach; ?>
        <?php else: ?>
          <pclass="text-center">Buku tidak ditemukan.</p>
          <?php endif; ?>
      </div>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <h3>Contact Me Here:</h3>
    <ul class="logo">
      <li style="--i:#a955ff;--j:#ea51ff">
        <span class="icon"><ion-icon name="logo-instagram"></ion-icon></span>
        <span class="title"><a style="text-decoration: none; color:white;"
            href="https://www.instagram.com/dkaahitra/">Dkaahitra</a></span>
      </li>
      <li style="--i:#FF8282;--j:#F7374F">
        <span class="icon"><ion-icon name="mail"></ion-icon></span>
        <span class="title"><a style="text-decoration:none; color:white;" href="mailto:galihisya8@gmail.com">Email
            Me!</a></span>
      </li>
    </ul>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>