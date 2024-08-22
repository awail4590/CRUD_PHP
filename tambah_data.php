<?php 
include_once("connect_db.php");

session_start();
if (!$_SESSION['login']) {
    header("location: /CRUD_PHP?pesan_login=akses_dilarang_harus_login_duluu.");
}

if (isset($_POST['btnsimpan'])) {

    $nama_brng=$_POST['nama_brng'];
    $jenis_brng=$_POST['jenis_brng'];
    $desk_brng=$_POST['deskripsi_brng'];


    $query=mysqli_query($conn, "INSERT INTO tbl_databarang (id_brng, nama_brng, jenis_brng, deskripsi_brng) VALUES ('','$nama_brng', '$jenis_brng', '$desk_brng')");

    header("location: beranda.php?pesan_tambah=Data_berhasil_ditambahkan.");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document Insert Data</title>
</head>
<body>
    <div class="kotak_link">
    <a href="beranda.php" class="tombol_link">
    <div class="kotak_tombol_link">
        <- Kembali
    </div>
    </a>
    </div>
    <div>
        <div class="tabel">
            <h3>FORM INPUT BARANG:</h3>
        </div>
        <form action="" method="POST">
            <table class="tabel">
            <tr>
                <td class="tabel_td"><label for="">Nama Barang :</label></td>
                <td><input type="text" name="nama_brng" placeholder="masukkan nama barang.." required></td>
            </tr>
            <tr>
                <td class="tabel_td"><label for="">Jenis Barang :</label></td>
                <td><input type="text" name="jenis_brng" placeholder="masukkan jenis barang.." required></td>
            </tr>
            <tr>
                <td class="tabel_td"><label for="">Deskripsi Barang :</label></td>
                <td><textarea name="deskripsi_brng" cols="30" rows="5" placeholder="masukkan deskripsi barang.." required></textarea></td>
            </tr>
            <tr>
                <td><button class="kotak_tombol_button" name="btnsimpan">SIMPAN DATA</button></td>
            </tr>
        </table>
    </form>
</body>
</html>