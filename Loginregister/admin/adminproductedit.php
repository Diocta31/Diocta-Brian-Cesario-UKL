<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id_produk = $_GET['id'];

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

        $query = "UPDATE product SET product_name='$nama_produk', description='$description', category='$kategori', stock='$stock', price='$harga_produk', picture_product='$newImageName' WHERE id_product='$id_produk'";
        $result = mysqli_query($mysqli, $query);

        if ($result) {
            header("Location:adminproduct.php");
            exit;
        } else {
            echo "Error: " . mysqli_error($mysqli);
        }
    }

    $query = "SELECT * FROM product WHERE id_product='$id_produk'";
    $result = mysqli_query($mysqli, $query);
    $data = mysqli_fetch_assoc($result);
} else {
    header("Location:adminproduct.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Produk</title>
    
    <link rel="stylesheet" href="adminproductedit.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Update Produk</h1>
        </header>
        <section class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" value="<?php echo $data['product_name']; ?>" required><br>

                <label for="description">Description</label>
                <input type="text" id="description" name="description" value="<?php echo $data['description']; ?>" required><br>

                <label for="">Category:</label>
                <select name="category" id="">
                    <option value=""></option>
                    <option value="clothing">Clothing</option>
                    <option value="decoration">Decoration</option>
                    <option value="craft">Craft</option>
                    <option value="cutlery">Cutlery</option>
                </select> <br>

                <label for="stock">Stock:</label>
                <input type="text" id="stock" name="stock" value="<?php echo $data['stock']; ?>" required><br>

                <label for="price">Price:</label>
                <input type="text" id="price" name="price" value="<?php echo $data['price']; ?>" required><br>

                <label for="picture_product">Picture Product:</label>
                <input type="file" id="picture_product" name="picture_product" accept=".jpg, .jpeg, .png"><br>
                <input type="hidden" name="gambar_produk_existing" value="<?php echo $data['picture_product']; ?>"><br>
                <input type="submit" name="submit" value="Update" class="button">
            </form>
        </section>
    </div>

    <script src="main.js"></script>
</body>
</html>
