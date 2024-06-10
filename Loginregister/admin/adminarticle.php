<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Article</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
 <!-- Navbar start -->
 <nav class="navbar">
        <a href="#" class="logo"><img src="../../Webjapan/image/logo.png" alt=""></a>

        <form>
            <div class="search">
                <a href="#" id="search"><i data-feather="search"></i></a>  
                <input class="search-input" type="search" placeholder="Search">                                          
            </div>
        </form> 

        <a href="#" id="log-out" class="logout">LOGOUT</a>

        <div class="navbar-nav">
            <h1>Admin Menu</h1>
            <a href="adminuser.php">User</a>
            <a href="adminarticle.php">Article</a>
            <a href="adminproduct.php">Product</a>
            <a href="adminorder.php">Order</a>
        </div>
        
        <div class="navbar-extra">                                                                               
            <a href="#" id="menu"><i data-feather="menu"></i></a>                                            
        </div>

        <div id="myModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <p>Are you sure you want to Log Out?</p>
              <a href="../loginregister.php" class="logout-btn">Log Out</a>
            </div>
        </div>          
    </nav>

    <section class="user">
        <a href="adminarticleadd.php" class="btn">Add Article</a>
       
        <table border="1" class="table">
            <tr>
                <th>Nomer</th>
                <th>Publish Date</th>
                <th>Title</th>
                <th>Article Content</th>
                <th>Article Categories</th>
                <th>Picture Article</th>
                <th>Action</th>
                <th>Action</th>
            </tr>
            <?php
            include '../connection.php';
            $query_mysql = mysqli_query($mysqli, "SELECT * FROM article") or die(mysqli_error($mysqli));
            $nomor = 1;
            while($data = mysqli_fetch_array($query_mysql)) { 
            ?>
            <tr>
                <td><?php echo $nomor++; ?></td>
                <td><?php echo $data['publish_date']; ?></td>
                <td><?php echo $data['title']; ?></td>
                <td><?php echo substr($data['article_content'], 0, 200); ?>...</td>
                <td><?php echo $data['category_name']; ?></td>
                <td><img src="image/<?php echo $data["picture_article"]; ?>" width="200" title="<?php echo $data['picture_article']; ?>"></td>
                <td class="action">
                    <a href="adminarticledelete.php?id=<?= $data["id_article"]; ?>" onclick="return confirm('Are you sure want to delete this data?');" class="btn" style="margin:5px; padding:10px;">Delete</a>
                </td>
                <td clas="action"><a href="adminarticleedit.php?id=<?php echo $data['id_article']; ?>" class="btn-update">Update</a> </td>
            </tr>
            <?php } ?>
        </table>
    </section>

    <section class="footer">
        <div class="footer-box">
            <h2>Exploring Japan</h2>
            <p>Website that contains socio-cultural information and sells products from Japan.</p>
            <div class="socials">
                <li><a href="#"><i data-feather="instagram" class="icon"></i></a></li>
                <li><a href="#"><i data-feather="twitter" class="icon"></i></a></li>
                <li><a href="#"><i data-feather="facebook" class="icon"></i></a></li>
            </div>
        </div>
        <div class="footer-box2">
            <h3>Page Link</h3>
            <li><a href="adminuser.php">User</a></li>
            <li><a href="adminarticle.php">Article</a></li>
            <li><a href="adminproduct.php">Product</a></li>
            <li><a href="adminorder.php">Order</a></li>
        </div>
        <div class="footer-box">
            <h3>Contact</h3>
            <div class="contact-footer">
                <span><i data-feather="map-pin" class="icon"></i>East Java - Indonesia</span>
                <span><i data-feather="phone" class="icon"></i>+62 858 9562 8575</span>
                <span><i data-feather="mail" class="icon"></i>exploringjapan.id@gmail.com</span>
            </div>
        </div>
    </section>
    <div class="credit">
        <div class="text-credit">
            <p>&copy; ExploringJapan 2024. All Right Reserved.</p>
        </div>
    </div>
    <!-- Script -->
    <script> feather.replace(); </script>

    <script>
        // Toggle class active
        const navbarNav = document.querySelector('.navbar-nav');
        // ketika menu diklik
        document.querySelector('#menu').onclick = () => {
            navbarNav.classList.toggle('active');
        };
    
        // klik diluar side bar
        const menu = document.querySelector('#menu');
    
        document.addEventListener('click', function(e) {
            if (!menu.contains(e.target) && !navbarNav.contains(e.target)) {
                navbarNav.classList.remove('active');
            }
        });
    
        // Menangkap semua tautan di dalam navbar
        const navLinks = document.querySelectorAll('.navbar-nav a');
    
        // Menambahkan event listener ke setiap tautan navbar
        navLinks.forEach(link => {
            link.addEventListener('click', () => {
                // Menonaktifkan navbar setelah mengarahkan pengguna
                navbarNav.classList.remove('active');
            });
        });
    
        // Dapatkan tombol menu
        const menuButton = document.getElementById('menuButton');
    
        // Tambahkan event listener ke tombol menu
        menuButton.addEventListener('click', function(event) {
            // Mencegah perilaku default dari tautan menu
            event.preventDefault();
            // Menampilkan atau menyembunyikan navbar
            navbarNav.classList.toggle('active');
        });
    </script>
    
    <script>
        // Dapatkan modal
        var modal = document.getElementById("myModal");
    
        // Dapatkan tombol yang membuka modal
        var btn = document.getElementById("log-out");
    
        // Dapatkan elemen <span> yang menutup modal
        var span = document.getElementsByClassName("close")[0];
    
        // Ketika tombol Logout ditekan, tampilkan modal
        btn.onclick = function() {
            modal.style.display = "block";
        }
    
        // Ketika pengguna mengklik tombol (x), tutup modal
        span.onclick = function() {
            modal.style.display = "none";
        }
    
        // Ketika pengguna mengklik di luar modal, tutup modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

    <script src="main.js"></script>
</body>
</html>