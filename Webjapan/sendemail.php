<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $to = 'exploringjapan.id@gmail.com';
    $subject = 'Message from Exploring Japan user';
    $headers = "From: $name <$email>";

    if (mail($to, $subject, $message, $headers)) {
        $pesan = "Pesan Anda berhasil terkirim!";
    } else {
        $pesan = "Maaf, terjadi kesalahan dalam mengirim pesan.";
    }
} else {
    $pesan = "Metode akses tidak valid.";
}
echo $pesan;
?>
