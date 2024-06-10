<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>(Admin) Add User</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&family=Signika:wght@400;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="adminuseradd.css">
</head>

<body>
    <div class="regist-container">
        <h1 class="title">Add User</h1>
        <form class="form" action="adminuseradd.php" method="post">

            <label for="username">Username:</label>
            <input type="text" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" name="password" required><br>

            <label for="role">Role:</label>
            <select name="role" required>
                <option value=""></option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select><br>

            <button class="button" type="Submit" name="Submit">Add</button>
        </form>
    </div>
    <?php
if (isset($_POST['Submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    include_once ("../connection.php");

    $result = mysqli_query($mysqli, "INSERT INTO users (username, email, password, role) VALUES ('$username', '$email', '$password', '$role')");

    if ($result) {
        header("location:adminuser.php");
    } else {
        echo "Error: " . mysqli_error($mysqli);
    }
}
?>


</body>

</html>