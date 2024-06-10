<?php
include '../connection.php';

if (isset($_GET['id'])) {
    $id_article = $_GET['id'];

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $content = $_POST['article_content'];
        $category_name = $_POST['category_name'];

      // Handle file upload
$newImageName = null;
if ($_FILES["picture_article"]["error"] == 0) {
    $fileName = $_FILES["picture_article"]["name"];
    $fileSize = $_FILES["picture_article"]["size"];
    $tmpName = $_FILES["picture_article"]["tmp_name"];

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

        $query = "UPDATE article SET title=?, article_content=?, category_name=?, picture_article=? WHERE id_article=?";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("ssssi", $title, $content, $category_name, $newImageName, $id_article);
        if ($stmt->execute()) {
            header("Location:adminarticle.php");
            exit;
        } else {
            echo "Error: " . $mysqli->error;
        }
    }

    $query = "SELECT * FROM article WHERE id_article=?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("i", $id_article);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    if (!$data) {
        echo "Article not found.";
        exit;
    }
} else {
    header("Location:adminarticle.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Article</title>
    
    <link rel="stylesheet" href="adminproductedit.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Update Article</h1>
        </header>
        <section class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="<?php echo $data['title']; ?>" required><br>

                <label for="article_content">Article Content</label>
                <input type="text" id="article_content" name="article_content" value="<?php echo $data['article_content']; ?>" required><br>

                <label for="category_name">Category:</label><br>
                <select name="category_name" id="category_name" required>
                    <option value="Culture" <?php if ($data['category_name'] == 'Culture') echo 'selected'; ?>>Culture</option>
                    <option value="Lifestyle" <?php if ($data['category_name'] == 'Lifestyle') echo 'selected'; ?>>Lifestyle</option>
                    <option value="Festival" <?php if ($data['category_name'] == 'Festival') echo 'selected'; ?>>Festival</option>
                    <option value="Art" <?php if ($data['category_name'] == 'Art') echo 'selected'; ?>>Art</option>
                    <option value="Traditional_Clothing" <?php if ($data['category_name'] == 'Traditional_Clothing') echo 'selected'; ?>>Traditional_Clothing</option>
                    <option value="Local_Food" <?php if ($data['category_name'] == 'Local_Food') echo 'selected'; ?>>Local_Food</option>
                    <option value="Pop" <?php if ($data['category_name'] == 'Pop') echo 'selected'; ?>>Pop</option>
                    <option value="Economy" <?php if ($data['category_name'] == 'Economy') echo 'selected'; ?>>Economy</option>
                    <option value="Technology" <?php if ($data['category_name'] == 'Technology') echo 'selected'; ?>>Technology</option>               
                </select><br>

                <label for="picture_article">Picture Article:</label>
                <input type="file" id="picture_article" name="picture_article" accept=".jpg, .jpeg, .png"><br>
                <input type="hidden" name="gambar_produk_existing" value="<?php echo $data['picture_article']; ?>"><br>
                <input type="submit" name="submit" value="Update" class="button">
            </form>
        </section>
    </div>

    <script src="main.js"></script>
</body>
</html>
