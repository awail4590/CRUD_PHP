<?php 
include_once("connect_db.php");

session_start();
if (!$_SESSION['login']) {
    header("location: /CRUD_PHP?pesan_login=akses_dilarang_harus_login_duluu.");
}

if (isset($_POST['btnedit'])) {
    
    $id_brng=$_POST['id_brng'];
    $nama_brng=$_POST['nama_brng'];
    $jenis_brng=$_POST['jenis_brng'];
    $desk_brng=$_POST['deskripsi_brng'];

    $query=mysqli_query($conn, "UPDATE tbl_databarang SET nama_brng='$nama_brng', jenis_brng='$jenis_brng', deskripsi_brng='$desk_brng' WHERE id_brng='$id_brng' ");

    //var_dump($query);
    header("location: beranda.php?pesan_edit=Data_berhasil_diubah.");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document Update Data</title>
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
            <h3>FORM EDIT BARANG:</h3>
        </div>
        <?php 
        $id_barang=$_GET['id_barang'];
        $query=mysqli_query($conn, "SELECT * FROM tbl_databarang WHERE id_brng='$id_barang'");
        while ($data=mysqli_fetch_array($query)) {
            ?>
                <form action="" method="POST">
                    <input type="hidden" name="id_brng" value="<?= $data['id_brng']; ?>">
                    <table class="tabel">
                    <tr>
                        <td class="tabel_td"><label for="">Nama Barang :</label></td>
                        <td><input type="text" name="nama_brng" value="<?= $data['nama_brng']; ?>" placeholder="masukkan nama barang.." required></td>
                    </tr>
                    <tr>
                        <td class="tabel_td"><label for="">Jenis Barang :</label></td>
                        <td><input type="text" name="jenis_brng" value="<?= $data['jenis_brng']; ?>" placeholder="masukkan jenis barang.." required></td>
                    </tr>
                    <tr>
                        <td class="tabel_td"><label for="">Deskripsi Barang :</label></td>
                        <td><textarea name="deskripsi_brng" cols="30" rows="5" placeholder="masukkan deskripsi barang.." required><?= $data['deskripsi_brng']; ?></textarea></td>
                    </tr>
                    <tr>
                        <td><button class="kotak_tombol_button" name="btnedit">EDIT DATA</button></td>
                    </tr>
                    </table>
                </form>
            <?php
        }
        ?>
</body>
</html>