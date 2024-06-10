<?php
// getbuy.php

include '../../Loginregister/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data yang dibutuhkan tersedia
    if (isset($_POST['username'], $_POST['id_product'], $_POST['price'], $_POST['amount_product'], $_POST['total_price'], $_POST['address'], $_POST['transaction_method'])) {
        // Tangkap data dari formulir
        $username = $_POST['username'];
        $id_product = $_POST['id_product'];
        $price = $_POST['price'];
        $amount_product = $_POST['amount_product'];
        $total_price = $_POST['total_price'];
        $address = $_POST['address'];
        $transaction_method = $_POST['transaction_method'];

        // Lakukan pembersihan data (optional)
        // $username = mysqli_real_escape_string($mysqli, $username);
        // $address = mysqli_real_escape_string($mysqli, $address);
        
        // Query untuk menyimpan data pembelian ke dalam database
        $query = "INSERT INTO orders (username, id_product, price, amount_product, total_price, address, transaction_method) VALUES ('$username', '$id_product', '$price', '$amount_product', '$total_price', '$address', '$transaction_method')";
        
        // Lakukan query
        if (mysqli_query($mysqli, $query)) {
            // Pengalihan halaman setelah pembelian berhasil disimpan
            header("Location: ../shop/transaction.php");
            exit; // Pastikan untuk keluar dari skrip setelah melakukan pengalihan
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($mysqli);
        }

        // Tutup koneksi database (optional)
        // mysqli_close($mysqli);
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Metode request tidak valid.";
}
?>
