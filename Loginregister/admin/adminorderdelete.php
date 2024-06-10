<?php
include '../connection.php';

if (isset($_POST['update'])) {
    $username = $_POST['username'];
    $id_order = $_POST['id_order'];
    $id_product = $_POST['id_product'];
    $price = $_POST['price'];
    $amount_product = $_POST['amount_product'];
    $total_price = $_POST['total_price'];
    $address = $_POST['address'];
    $transaction_method = $_POST['transaction_method'];
    $order_date = $_POST['order_date'];

    // Perbarui data sesuai dengan kolom-kolom yang sesuai dengan tabel orders
    $query = "UPDATE orders SET username='$username', id_product='$id_product', price='$price', amount_product='$amount_product', total_price='$total_price', address='$address', transaction_method='$transaction_method', order_date='$order_date' WHERE id_order=$id_order";
    $result = mysqli_query($mysqli, $query);

    if ($result) {
        echo "Data berhasil diperbarui.";
        header("Location: adminorder.php");
        exit();
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($mysqli);
    }
}

if (isset($_GET['id'])) {
    $id_order = $_GET['id'];
    $query = "SELECT * FROM orders WHERE id_order =$id_order";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    echo "ID order tidak ditemukan.";
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Admin) Delete Order</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="style_delete.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Delete Order</h1>
        </header>
        <section class="form">
            <form method="POST" action="">
                <p>Are you sure you want to delete this order?</p>
                <input type="hidden" name="id_order" value="<?php echo $data['id_order']; ?>">
                <p><strong>ID Order:</strong> <?php echo $data['id_order']; ?></p>
                <p><strong>Username:</strong> <?php echo $data['username']; ?></p>
                <p><strong>ID Product:</strong> <?php echo $data['id_product']; ?></p>
                <p><strong>Price:</strong> <?php echo $data['price']; ?></p>
                <p><strong>Amount Product:</strong> <?php echo $data['amount_product']; ?></p>
                <p><strong>Total Price:</strong> <?php echo $data['total_price']; ?></p>
                <p><strong>Address:</strong> <?php echo $data['address']; ?></p>
                <p><strong>Transaction Method:</strong> <?php echo $data['transaction_method']; ?></p>
                <p><strong>Order Date:</strong> <?php echo $data['order_date']; ?></p>
                <input type="submit" name="delete" value="Delete" class="button">
            </form>
        </section>
    </div>
</body>
</html>
