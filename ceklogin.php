<?php
include "koneksi.php";
$username = $_POST['username'];
$password = $_POST['password'];
$q = mysqli_query($konek, "SELECT * FROM tb_user WHERE username='$username'");
$data = mysqli_fetch_array($q);
if (mysqli_num_rows($q)) {
    if (password_verify($password, $data['password'])) {
        //Login
        session_start();
        $_SESSION['username'] = $data['username'];
        header('location:index.php');
    } else {
        //pasword
        header('location:login.php?pesan=Password salah');
    }
} else {
    //username
    header('location:login.php?pesan=Username salah');
}
