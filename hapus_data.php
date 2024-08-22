<?php 
include_once("connect_db.php");

session_start();
if (!$_SESSION['login']) {
    header("location: /CRUD_PHP?pesan_login=akses_dilarang_harus_login_duluu.");
}

$id_barang=$_GET['id_barang'];
$query=mysqli_query($conn, "DELETE FROM tbl_databarang WHERE id_brng='$id_barang'");

//var_dump($query);
header("location: beranda.php?pesan_hapus=Data_berhasil_dihapus.");

?>