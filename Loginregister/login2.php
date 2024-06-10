<?php
// Mengaktifkan session pada php
session_start();
include 'connection.php';

$username = $_POST['user'];
$password = $_POST['pass'];

$login = mysqli_query($mysqli,"select * from users where username='$username' and password='$password'");
$cek = mysqli_num_rows($login);

if($cek > 0){
    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai admin
    if($data['role']=="admin"){

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashbord admin
        header("location:admin/adminuser.php");

        // cek jika user login sebagai user
    }else if($data['role']=="user"){
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "user";
        header("location:../Webjapan/indexx.php");
    }else{
        header("location:indexx.php");
    }
}else{
    header("location:login2.php?pesan=gagal");

}