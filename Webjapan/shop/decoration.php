<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exploring Japan</title>
    <link rel="stylesheet" href="shop.css">

    <!-- Font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,400;0,700;1,700&display=swap" rel="stylesheet">

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons"></script>
</head>
<body>
    
   <!-- Navbar start -->
   <nav class="navbar">
    <a href="#" class="logo"><img src="../image/logo.png" alt=""></a>

    <form>
        <div class="search">
            <a href="#" id="search"><i data-feather="search"></i></a>  
            <input class="search-input" type="search" placeholder="Search">                                          
        </div>
    </form> 

    <a href="#" id="log-out" class="logout">LOGOUT</a>

    <div class="navbar-nav">
        <h1>Explore</h1>
        <a href="../indexx.php #home">Home</a>
        <a href="../culture/culture.php">Culture</a>
        <a href="../shop/shop.php #shopmenu">Shop</a>
        <h1>Information</h1>
        <a href="../indexx.php #contact">Contact</a>
        <a href="transaction.php">Transaction</a>
    </div>
    
    <div class="navbar-extra">                                                                               
        <a href="#" id="menu"><i data-feather="menu"></i></a>                                            
    </div>

    <div id="myModal" class="modal">
        <div class="modal-content">
          <span class="close">&times;</span>
          <p>Are you sure you want to Log Out?</p>
          <a href="../../Loginregister/loginregister.php" class="logout-btn">Log Out</a>
        </div>
    </div>        
</nav>

<section id="hero">
    <h4>ユニークな日本の特産品を見つける</h4>
    <h1>"Discover Unique Japanese Products"</h1>
    <h2>100% Original from Japan</h2>
    <p>Explore the richness of Japanese culture through our collection of signature products. We offer a wide selection of authentic products that represent the beauty and uniqueness of Japan.</p>
    <a href="#decoration" class="button">Get It Now</a>
</section>

<div class="subtitle" id="decoration">
    <h1>Japanese Products</h1>
</div>

<div class="container">
  <div class="categories">
      <a href="../shop/shop.php #shopmenu"> <h1>Categories</h1></a>
      <ul>
          <li><a href="../shop/clothing.php #clothing">Clothing</a></li>
          <li><a href="../shop/decoration.php #decoration">Decoration</a></li>
          <li><a href="../shop/craft.php #craft">Craft</a></li>
          <li><a href="../shop/cutlery.php #cutlery">Cutlery</a></li>
      </ul>
  </div>
  <div class="products">
    <!-- Looping untuk menampilkan produk dari database -->
    <?php
    require '../../Loginregister/connection.php';

    // Query untuk mengambil data produk
    $query = "SELECT id_product, product_name, price, description, picture_product FROM product WHERE category = 'decoration'";
    $result = mysqli_query($mysqli, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='product'>";
            echo "<a href='../order/orderform.php?id_product=" . $row['id_product'] . "'>";
            echo "<img src='../image/" . $row['picture_product'] . "'>"; 
            echo "</a>";
            echo "<h4>" . $row['price'] . "</h4>";
            echo "<h3>" . $row['product_name'] . "</h3>"; 
            echo "<p>" . $row['description'] . "</p>"; 
            echo "<div class='stars'>"; 
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16' height='16' width='16'>";
            echo "<path fill='#000000' d='m12.4725 10.254 0.4717 5.346 -4.94425 -2.1001L3.05571 15.6l0.47164 -5.346L0 6.20591l5.23573 -1.20395L7.99995 0.400024 10.7642 5.00196l5.2357 1.20395 -3.5274 4.04809Z' stroke-width='1'></path>";
            echo "</svg>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16' height='16' width='16'>";
            echo "<path fill='#000000' d='m12.4725 10.254 0.4717 5.346 -4.94425 -2.1001L3.05571 15.6l0.47164 -5.346L0 6.20591l5.23573 -1.20395L7.99995 0.400024 10.7642 5.00196l5.2357 1.20395 -3.5274 4.04809Z' stroke-width='1'></path>";
            echo "</svg>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16' height='16' width='16'>";
            echo "<path fill='#000000' d='m12.4725 10.254 0.4717 5.346 -4.94425 -2.1001L3.05571 15.6l0.47164 -5.346L0 6.20591l5.23573 -1.20395L7.99995 0.400024 10.7642 5.00196l5.2357 1.20395 -3.5274 4.04809Z' stroke-width='1'></path>";
            echo "</svg>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16' height='16' width='16'>";
            echo "<path fill='#000000' d='m12.4725 10.254 0.4717 5.346 -4.94425 -2.1001L3.05571 15.6l0.47164 -5.346L0 6.20591l5.23573 -1.20395L7.99995 0.400024 10.7642 5.00196l5.2357 1.20395 -3.5274 4.04809Z' stroke-width='1'></path>";
            echo "</svg>";
            echo "<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16' height='16' width='16'>";
            echo "<path fill='#000000' d='m12.4725 10.254 0.4717 5.346 -4.94425 -2.1001L3.05571 15.6l0.47164 -5.346L0 6.20591l5.23573 -1.20395L7.99995 0.400024 10.7642 5.00196l5.2357 1.20395 -3.5274 4.04809Z' stroke-width='1'></path>";
            echo "</svg>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        echo "Tidak ada produk yang ditemukan.";
    }
    ?>
</div>

</div>

<!-- footer -->
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
        <li><a href="../indexx.php">Home</a></li>
        <li><a href="../culture/culture.php">Culture</a></li>
        <li><a href="../shop/shop.php">Shop</a></li>
        <li><a href="../indexx.php #contact">Contact</a></li>
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
        if(!menu.contains(e.target) && !navbarNav.contains(e.target)) {
            navbarNav.classList.remove('active');
        }
    });
</script>    

<script>
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
<script>
    feather.replace();
</script>

</body>
</html>
