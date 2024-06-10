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
    echo "ID product tidak ditemukan.";
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Admin) Update order</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="style_update.css">
</head>

<body>
<section class="form">
    <header>
        <h1 class="title">Update User</h1>
        <?php
        if (isset($_GET['id'])) {
            $id_order = $_GET['id'];
            $query = "SELECT * FROM orders WHERE id_order =$id_order";
            $result = mysqli_query($mysqli, $query);
            $data = mysqli_fetch_assoc($result);
        } else {
            echo "<p>ID order tidak ditemukan.</p>";
            exit();
        }
        ?>
    </header>
    <form method="POST" action="">
        <input type="hidden" name="id_order" value="<?php echo $data['id_order']; ?>">

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo $data['username']; ?>"><br>

        <label for="id_product">ID Product:</label><br>
        <input type="text" id="id_product" name="id_product" value="<?php echo $data['id_product']; ?>"><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br>

        <label for="amount_product">Amount Product:</label>
        <input type="number" id="amount_product" name="amount_product" min="1" required><br>

        <label for="total_price">Total Price:</label>
        <input type="text" id="total_price" name="total_price" required><br>

        <label for="address">Address:</label>
        <input type="text" id="address" name="address" required><br>

        <label for="transaction_method">Transaction Method:</label>
        <select id="transaction_method" name="transaction_method" required>
            <option value="Cash">COD</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
        </select><br>

        <label for="order_date">Order Date:</label><br>
        <input type="date" id="order_date" name="order_date" value="<?php echo $data['order_date']; ?>"><br>

        <input type="submit" name="update" value="Update" class="button">
    </form>
</section>
</body>
</html>
