<?php
include '../connection.php';

$id_article = $_GET['id'];

$hapus = mysqli_query($mysqli, "DELETE FROM article WHERE id_article = '$id_article'") or die(mysqli_error($mysqli));

if($hapus) {
    header("Location: adminarticle.php");
    exit();
} else {
    echo "Gagal menghapus produk.";
}
?>