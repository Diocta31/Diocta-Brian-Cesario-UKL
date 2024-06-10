<?php
// Menghubungkan ke database
include '../../Loginregister/connection.php';

if(isset($_GET['id'])) {
    // Menghindari SQL injection dengan prepared statement
    $id_product = $_GET['id'];
    
    // Persiapkan pernyataan SQL
    $query = "SELECT price FROM product WHERE id_product = ?";
    
    // Persiapkan pernyataan
    $stmt = mysqli_prepare($mysqli, $query);
    
    // Bind parameter
    mysqli_stmt_bind_param($stmt, "i", $id_product);
    
    // Eksekusi pernyataan
    mysqli_stmt_execute($stmt);
    
    // Simpan hasil
    mysqli_stmt_store_result($stmt);
    
    if(mysqli_stmt_num_rows($stmt) > 0) {
        // Bind hasil
        mysqli_stmt_bind_result($stmt, $price);
        mysqli_stmt_fetch($stmt);
        echo $price; // Mengembalikan harga produk
    } else {
        echo "0"; // Jika produk tidak ditemukan, kembalikan harga 0 atau harga default
    }
    
    // Tutup pernyataan
    mysqli_stmt_close($stmt);
} else {
    echo "Parameter 'id' tidak ditemukan."; // Jika parameter id tidak ditemukan
}
?>
