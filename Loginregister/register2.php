<?php
require 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["user"];
    $email = $_POST["email"];
    $password = $_POST["pass"];

    $role = "user";

    // Pengecekan apakah nama pengguna sudah ada
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $check_result = mysqli_query($mysqli, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        // Jika nama pengguna sudah ada, tampilkan notifikasi
        echo "<script>
                alert('Pendaftaran Gagal: Nama pengguna \"$username\" sudah digunakan.');
                window.history.back();
              </script>";
        exit(); // Hentikan eksekusi skrip setelah menampilkan notifikasi
    } else {
        // Jika nama pengguna belum ada, lanjutkan dengan proses pendaftaran
        $query_sql = "INSERT INTO users (username, email, password, role)
                          VALUES ('$username', '$email', '$password', '$role')";

        if(mysqli_query($mysqli, $query_sql)) {
            header("location:loginregister.php");
        } else {
            echo "Pendaftaran Gagal : " . mysqli_error($mysqli);
        }
    }
}
?>
