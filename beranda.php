<?php 
include_once("connect_db.php");

session_start();
if (!$_SESSION['login']) {
    header("location: /CRUD_PHP?pesan_login=akses_dilarang_harus_login_duluu.");
}

if (isset($_POST['btnlogout'])) {
    session_destroy();
    header("location: /CRUD_PHP?pesan_logout=berhasil.");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="kotak_link">
    <a href="tambah_data.php" class="tombol_link">
    <div class="kotak_tombol_link">
        + Tambah Data
    </div>
    </a>
    <form onclick="return confirm('Apakah anda yakin ingin logout?')" action="" method="POST">
        <button name="btnlogout" style="margin-left: 250px; font-weight: bold; background-color: red; border-radius: 5px"> LOGOUT/KELUAR?</button>
    </form>
    </div>
    <div>
        <?php 
        if (isset($_GET['pesan_tambah'])) {
            ?>
            <table class="tabel">
            <tr>
                <th class="pesan_berhasil">Data berhasil ditambahkan.</th>
            </tr>
            </table>
            <?php
        }elseif (isset($_GET['pesan_edit'])) {
            ?>
            <table class="tabel">
            <tr>
                <th class="pesan_berhasil">Data berhasil diubah.</th>
            </tr>
            </table>
            <?php
        }elseif (isset($_GET['pesan_hapus'])) {
            ?>
            <table class="tabel">
            <tr>
                <th class="pesan_berhasil">Data berhasil dihapus.</th>
            </tr>
            </table>
            <?php
        }
        ?>
    <table class="tabel" border="1" cellpadding="5">
        <tr class="tabel_data">
            <th>No</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Deskripsi Barang</th>
            <th colspan="2">Aksi</th>
        </tr>
        <?php 
            $no=1;
            $query=mysqli_query($conn, "SELECT * FROM tbl_databarang");
            $jml_data=mysqli_num_rows($query);
            if ($jml_data == null) {
                ?>
                <tr>
                    <th colspan="6">Tidak ada data.</th>
                </tr>
                <?php
            }else{
            while ($data=mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $data['nama_brng']; ?></td>
                        <td><?= $data['jenis_brng']; ?></td>
                        <td><?= $data['deskripsi_brng']; ?></td>
                        <td>
                            <form action="edit_data.php?id_barang=<?= $data['id_brng']; ?>" method="POST">
                                <button>Edit</button>
                            </form>
                        </td>
                        <td>
                            <form onclick="return confirm('Apakah anda yakin ingin menghapus data barang ini?')" action="hapus_data.php?id_barang=<?= $data['id_brng']; ?>" method="POST">
                                <button>Hapus</button>
                            </form>
                        </td>
                    </tr>
                <?php
            }
        }
        ?>
    </table>
    </div>
</body>
</html>