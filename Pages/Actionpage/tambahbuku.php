<?php 
include('../../Config/controller.php');

// ambil kategori
$data_kategori = select("SELECT * FROM kategori");

if (isset($_POST['tambah'])) {
    $path = (string)$_GET['path'];
    if (Tambah_buku($_POST) > 0) {
                    switch($path) {
                case 'admin':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../AdminPages/TableBuku.php?pesan=tambahberhasil");
                    exit;
                case 'petugas':
                    // Redirect ke halaman lain, misalnya dashboard
                    header("Location:../PetugasPages/TableBuku.php?pesan=tambahberhasil");
                    exit;
                default:
                    echo "<script>alert('role tidak valid!');</script>";
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
    <title>Tambah Buku</title>
    <!-- <link rel="stylesheet" href="style/style.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="kontener" style="background-image: url(../../images/TestBawah3.jpg); background-repeat: no-repeat;
  background-size: cover; width:99.2vw; height:100vh; opacity:85%;">

        <div class="card bg-transparent position-absolute top-50 start-50 translate-middle shadow-lg"
            style="padding:2em; backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(20px); border-radius: 2em; padding: 3em 5em; width:35vw; height: 99.2vh;">

            <h1 style="text-align:center; color:#9EC6F3;">Tambah Buku Baru</h1>
            <form action="" method="POST"><br>
                <label style="color:white;" for="id_kategori">Kategori Buku</label>
                <select class="form-control" name="id_kategori"required>
                    <?php foreach($data_kategori as $kategori): ?>
                        <option value="<?=$kategori['id_kategori']?>"><?=$kategori['nama'];?></option>
                    <?php endforeach;?>
                </select>
                <br>
                <label style="color:#F8F8E1;" for="judul">Judul Buku</label>
                <input class="form-control" type="text" name="judul" required>
                <br>
                <label style="color:#F8F8E1;" for="pengarang">Pengarang</label>
                <input class="form-control" type="text" name="pengarang" required>
                <br>
                <label style="color:#F8F8E1;" for="deskripsi">Deskripsi Buku</label>
                <input class="form-control" type="text" name="deskripsi" required>
                <br>
                <label style="color:#;" for="tahun_terbit">Tahun Terbit</label>
                <input class="form-control" type="text" name="tahun_terbit" required>
                <br>
                <label style="color:#;" for="jumlah">Jumlah</label>
                <input class="form-control" type="text" name="jumlah" required>
                <br>
                <label style="color:#;" for="gambar">Gambar</label>
                <input class="form-control" type="text" name="gambar" required>
                <br>
                <label style="color:;" for="readtime">Read Time</label>
                <input class="form-control" type="text" name="readtime" required>

                <br><br>
                <input class="btn btn-dark position-absolute top-90 start-50 translate-middle" type="submit"
                    name="tambah" value="Tambah Buku Baru">
            </form>
        </div>
    </div>

</body>

</html>