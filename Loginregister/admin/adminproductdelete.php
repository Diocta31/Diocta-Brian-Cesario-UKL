<?php
include '../connection.php';

$id_produk = $_GET['id'];

$hapus = mysqli_query($mysqli, "DELETE FROM product WHERE id_product = '$id_produk'") or die(mysqli_error($mysqli));

if($hapus) {
    header("Location: adminproduct.php");
    exit();
} else {
    echo "Gagal menghapus produk.";
}
?>