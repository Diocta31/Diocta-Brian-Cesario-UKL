<?php
include '../connection.php';

if (isset($_POST['submit'])) {
    $nama_produk = $_POST['product_name'];
    $description = $_POST['description'];
    $kategori = $_POST['category'];
    $stock = $_POST['stock'];
    $harga_produk = $_POST['price'];

   // Handle file upload
$newImageName = null;
if ($_FILES["picture_product"]["error"] == 0) {
    $fileName = $_FILES["picture_product"]["name"];
    $fileSize = $_FILES["picture_product"]["size"];
    $tmpName = $_FILES["picture_product"]["tmp_name"];

    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $fileName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
        echo "<script> alert('Invalid Image Extension'); </script>";
        exit;
    } else if ($fileSize > 1000000) {
        echo "<script> alert('Image Size Is Too Large'); </script>";
        exit;
    } else {
        // Gunakan nama asli file yang diunggah
        $newImageName = $fileName;

        move_uploaded_file($tmpName, 'admin/image/' . $newImageName);
    }
}

    if ($newImageName) {
        $query = "INSERT INTO product (product_name, description, category, stock, price, picture_product) VALUES ('$nama_produk', '$description', '$kategori', '$stock', '$harga_produk', '$newImageName')";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location: adminproduct.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    
    <link rel="stylesheet" href="adminproductadd.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Add Product</h1>
        </header>
        <section class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="product_name">Product Name:</label><br>
                <input type="text" id="product_name" name="product_name" required><br>

                <label for="description">Description:</label><br>
                <input type="text" id="description" name="description" required><br>

                <label for="category">Category:</label><br>
                <select name="category" id="category" required>
                    <option value=""></option>
                    <option value="clothing">Clothing</option>
                    <option value="decoration">Decoration</option>
                    <option value="craft">Craft</option>
                    <option value="cutlery">Cutlery</option>
                </select><br>

                <label for="stock">Stock:</label><br>
                <input type="text" id="stock" name="stock" required><br>

                <label for="price">Price:</label><br>
                <input type="text" id="price" name="price" required><br>

                <label for="picture_product">Picture Product:</label><br>
                <input type="file" id="picture_product" name="picture_product" accept=".jpg, .jpeg, .png" required><br>

                <input type="submit" name="submit" value="Add Product" class="button">
            </form>
        </section>
    </div>

    <script src="main.js"></script>
</body>
</html>
