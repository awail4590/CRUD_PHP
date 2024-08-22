<?php
include_once("connect_db.php");

session_start();

if (isset($_POST['btnlogin'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username='$username' AND password='$password'");
    $ceklogin = mysqli_num_rows($query);
    if ($ceklogin == null) {
        header("location: /CRUD_PHP?pesan_login_gagal=harap_masukkan_username_atau_password_yang_benar.");
    } else {
        $_SESSION['login'] = true; //session dengan nama login dengan kondisi true
        header("location: beranda.php?pesan_login=berhasil.");
    }
}

if (isset($_SESSION['login'])) {
    // isset berfungsi sebagai jika ada, jika diakses, atau jika ditekan(sebuah tombol) maka baru bisa berjalan
    // jika sudah masuk ke beranda dengan session loginnya true maka tidak bisa kembali ke hal login
    // harus logout
    header("location: beranda.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css internal -->
    <title>Login</title>
</head>

<body>
    <center>
        <div style="padding: 5%;
    background-color: green;
    width: 40%;
    height: 30%;
    border-radius: 10px;
    margin-top: 10%">
            <form action="" method="POST">
                <table cellpadding="7" border="1">
                    <tr>
                        <th>
                            <h2 style="color: whitesmoke">LOGIN DULU!</h2>
                        </th>
                    </tr>
                    <tr>
                        <th><input type="text" name="username" placeholder="masukkan username.."></th>
                    </tr>
                    <tr>
                        <th><input type="password" name="password" placeholder="masukkan password.."></th>
                    </tr>
                    <tr>
                        <th><button style="padding-left: 40px; padding-right: 40px; padding-bottom: 5px; padding-top: 5px; background-color: red; color: whitesmoke" name="btnlogin">MASUK</button></th>
                    </tr>
                </table>
            </form>
        </div>
    </center>
</body>

</html>