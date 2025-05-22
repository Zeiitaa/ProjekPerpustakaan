<?php
    // Memanggil Koneksi Database
    include ("koneksi.php") ;

    // Fungsi Tambah Akun  
    function create_akun($post) {
        global $db ;
        $name = strip_tags($post ['name']) ;
        $username = strip_tags($post ['username']) ;
        $password = strip_tags($post ['password']) ;
        $level = strip_tags($post ['level']) ;
        $status = strip_tags($post ['status']) ;


        // Query Tambah Data
        // Null untuk ID(Auto Increment)
        $query = "INSERT INTO logininfo VALUES (NULL, '$name', '$username', '$password', '$level', '$status' ) " ;

        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;
    }

    //Fungsi Ubah Akun
    function ubah_akun($post) {
        global $db ;
        $id = $post['id'];
        $name = $post['name'];
        $username = $post['username'];
        $password = $post['password'];
        $level = $post['level'];
        $status = $post['status'];
        
        //sql ubah Akun
        $query = "UPDATE logininfo SET name= '$name', username='$username', password='$password', level='$level', status='$status' WHERE id='$id'";
        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;
    }

    //Fungsi Hapus akun 
    function hapus_akun($id) {
        global $db ;
        //SQL DELETE Akun
        $query = "DELETE FROM logininfo WHERE id = $id";
        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;  
    }

    //Fungsi menampilkan data akun
    function select($query){
        global $db ;
        $result = mysqli_query($db , $query) ;
        $rows = [];
         while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row ;
        }
        return $rows;
    }    

    // Fungsi Tambah Kategori  
    function create_buku($post) {
        global $db ;
        $nama = strip_tags($post ['nama']) ;

        // Query Tambah Data
        // Null untuk ID(Auto Increment)
        $query = "INSERT INTO kategori VALUES (NULL, '$nama')" ;

        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;
    }

    //Fungsi Ubah Kategori
    function ubah_buku($post) {
        global $db ;
        $id = $post['id'];
        $nama = $post['nama'];
        
        //sql ubah Akun
        $query = "UPDATE kategori SET nama= '$nama' WHERE id_kategori='$id'";
        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;
    }

//Fungsi Hapus Kategori
    function hapus_buku($id) {
        global $db ;
        //SQL DELETE Akun
        $query = "DELETE FROM kategori WHERE id_kategori = $id";
        mysqli_query($db ,$query) ;
        return mysqli_affected_rows($db) ;  
}

// Tambah Buku
function Tambah_buku($post) {
    global $db ;
    $kategori = strip_tags($post ['id_kategori']);
    $judul = strip_tags($post ['judul']) ;
    $pengarang = strip_tags($post ['pengarang']) ;
    $deskripsi = strip_tags($post ['deskripsi']) ;
    $tahun_terbit = strip_tags($post ['tahun_terbit']) ;
    $jumlah = strip_tags($post ['jumlah']) ;
    $gambar = strip_tags($post ['gambar']) ;
    $readtime = strip_tags($post ['readtime']) ;

    // Query Tambah Data
    // Null untuk ID(Auto Increment)
    $query = "INSERT INTO buku VALUES (NULL, '$kategori','$judul','$pengarang','$deskripsi','$tahun_terbit','$jumlah','$gambar','$readtime')" ;

    mysqli_query($db ,$query) ;
    return mysqli_affected_rows($db) ;
}

 //Fungsi Ubah buku
 function ubah_infobuku($post) {
    global $db ;
    $id= $post['id'];
    $kategori = $post ['id_kategori'];
    $judul =$post ['judul'] ;
    $pengarang = $post ['pengarang'] ;
    $deskripsi = $post ['deskripsi'] ;
    $tahun_terbit = $post ['tahun_terbit'] ;
    $jumlah = $post ['jumlah'] ;
    $gambar = $post ['gambar'] ;
    $readtime = $post ['readtime'] ;
    
    //sql ubah Akun
    $query = "UPDATE buku SET id_kategori='$kategori', judul= '$judul', pengarang='$pengarang', deskripsi = '$deskripsi', tahun_terbit = '$tahun_terbit', jumlah='$jumlah',gambar = '$gambar', readtime = '$readtime' WHERE id='$id'";
    mysqli_query($db ,$query) ;
    return mysqli_affected_rows($db) ;
}

//Fungsi Hapus Buku
function hapus_infobuku($id) {
    global $db ;
    //SQL DELETE Akun
    $query = "DELETE FROM buku WHERE id= $id";
    mysqli_query($db ,$query) ;
    return mysqli_affected_rows($db) ;  
}

?>