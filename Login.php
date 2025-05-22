<?php
session_start();
include ("config/controller.php") ;

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

$query = "SELECT * FROM logininfo WHERE username = '$username'";

$user = select($query);

//Syntax mengecek usn dan pw yang di input
//menentukan user
if (!empty($user)) {
  
    if ($user[0]['password'] === $password) {

        $_SESSION['id'] = $user[0]['id'];
        $_SESSION['username'] = $user[0]['username'];
        $_SESSION['status'] = $user[0]['status'];  

        $status = $user[0]['status'];
      
            switch($status) {
                case 'admin':
                    // Login berhasil
                        echo "<script>alert('Login berhasil!');</script>";
                    // Redirect ke halaman lain, misalnya dashboard
                    $id = $user[0]['id'];
                    header("Location:Pages/AdminPages/AdminPage.php?id=$id");
                    exit;
                case 'petugas':
                    // Login berhasil
                    echo "<script>alert('Login berhasil!');</script>";
                    // Redirect ke halaman lain, misalnya dashboard
                    $id = $user[0]['id'];
                    header("Location:Pages/PetugasPages/PetugasPage.php?id=$id");
                    exit;
                case 'siswa':
                    // Login berhasil
                        echo "<script>alert('Login berhasil!');</script>";
                        $id = $user[0]['id'];
                    // Redirect ke halaman lain, misalnya dashboard
                        header("Location:Pages/UserPages/Siswa.php?id=$id");
                    exit;  
                default:
                    echo "<script>alert('status tidak valid!');</script>";
                    break;      
            }
       
    } else {
        // Password salah
        echo "<script>alert('Username atau password salah');</script>";
    }
} else {
    // Username tidak ditemukan
    echo "<script>alert('Username not found!');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Perpus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="kontener" style="background-image: url(images/Depan5.png); background-repeat: no-repeat;
  background-size: cover; width:100vw; height:100vh; opacity: 100%;">
    
        <div class="card bg-transparent  position-absolute top-50 start-50 translate-middle shadow-lg" 
        style="padding:5em; backdrop-filter: blur(7px); -webkit-backdrop-filter: blur(10px); border-radius: 3em;">
        
        <h1 style="text-align:center; color: black;">LOGIN</h1>
            <form action="" method="POST"><br>

                <label style="color:black;" for="username">Username</label>
                <input class="form-control" type="text" name="username" required>
                <br>
                <label style="color:black;" for="password">Password</label>
                <input class="form-control" type="password" name="password" required>

                <br>
                <label style="color:Black; text-decoration: none;">Belum Punya Akun?</label>
                <a href='Registrasi.php' class="info" style="text-decoration: none;">Register</a>
                <br>
                <a href='Index.php' style="color:black; text-decoration: none;">Masuk Sebagai Tamu</a>
                <br>
                <br>
                <br>
                <button class="btn btn-dark position-absolute top-90 start-50 translate-middle"  type="submit"
                    name="login" value="Login">Login</button>
            </form>

        </div>
    </div>
</body>

</html>