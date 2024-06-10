<?php
include '../connection.php';

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

    // Get category ID based on category name
    $get_category_id_query = "SELECT categories_id FROM article_categories WHERE name = ?";
    $stmt = $mysqli->prepare($get_category_id_query);
    $stmt->bind_param("s", $category_name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $category_id = $row['categories_id'];

        // Insert new article data into the article table
        $insert_article_query = "INSERT INTO article (title, article_content, category_name, picture_article) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->prepare($insert_article_query);
        $stmt->bind_param("ssss", $title, $content, $category_name, $newImageName);
        if ($stmt->execute()) {
            header("Location: adminarticle.php");
            exit;
        } else {
            die("Error: " . $mysqli->error);
        }
    } else {
        die("Error: Category not found.");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Article</title>
    
    <link rel="stylesheet" href="adminarticleadd.css">
</head>
<body>
    <div class="container">
        <header>
            <h1 class="title">Add Article</h1>
        </header>
        <section class="form">
            <form method="POST" action="" enctype="multipart/form-data">
                <label for="title">Title:</label><br>
                <input type="text" id="title" name="title" required><br>

                <label for="article_content">Content:</label><br>
                <textarea id="article_content" name="article_content" required></textarea><br>

                <label for="category_name">Category:</label><br>
                <select name="category_name" id="category_name" required>
                    <option value=""></option>
                    <option value="Culture">Culture</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Festival">Festival</option>
                    <option value="Art">Art</option>
                    <option value="Traditional_Clothing">Traditional_Clothing</option>
                    <option value="Local_Food">Local_Food</option>
                    <option value="Pop">Pop</option>
                    <option value="Economy">Economy</option>
                    <option value="Technology">Technology</option>
                </select><br>

                <label for="picture_article">Picture Product:</label><br>
                <input type="file" id="picture_article" name="picture_article" accept=".jpg, .jpeg, .png" required><br>

                <input type="submit" name="submit" value="Add Article" class="button">
            </form>
        </section>
    </div>

    <script src="main.js"></script>
</body>
</html>
