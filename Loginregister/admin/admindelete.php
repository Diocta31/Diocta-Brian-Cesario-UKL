<?php
include_once '../connection.php';

$id = $_GET['id'];


if (hpengguna($id) > 0) {
    

    echo "<script>
    alert('Data berhasil dihapus!');
    document.location.href = 'adminuser.php';
    </script>";
    
} else {
    echo "<script>
    alert('Data gagal dihapus!');
    document.location.href = 'adminuser.php';
    </script>";
}

