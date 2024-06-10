<?php
// Menerima ID produk dari URL
if(isset($_GET['id_product'])) {
    // Menghubungkan ke database
    include '../../Loginregister/connection.php';
    
    // Menghindari SQL injection
    $id_product = mysqli_real_escape_string($mysqli, $_GET['id_product']);
    
    // Query untuk mendapatkan informasi produk berdasarkan ID
    $query = "SELECT * FROM product WHERE id_product = $id_product";
    $result = mysqli_query($mysqli, $query);

    // Memeriksa apakah produk ditemukan
    if(mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
        // Variabel untuk mengisi formulir
        $product_name = $product['product_name'];
        $price = $product['price'];
        // Tambahkan detail produk yang lain sesuai kebutuhan
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order</title>
    <link rel="stylesheet" href="orderform.css">
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
            <a href="../indexx.php">Home</a>
            <a href="../culture/culture.php">Culture</a>
            <a href="../shop/shop.php">Shop</a>
            <h1>Information</h1>
            <a href="../indexx.php #contact">Contact</a>
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

<form action="getbuy.php" method="POST" id="form_pemesanan" class="form-products">
<div class="products">
    <?php
    // Periksa apakah ada produk yang ditemukan
    if (isset($product)) {
        ?>
       <div class="product" id="<?php echo $product['id_product']; ?>">
        <a href="../order/orderform.php?id_product=<?php echo $product['id_product']; ?>">
            <img src="../image/<?php echo $product['picture_product']; ?>" alt="<?php echo $product['product_name']; ?>">
        </a>
        <h4><?php echo $product['price']; ?></h4>
        <h3><?php echo $product['product_name']; ?></h3>
        <p><?php echo $product['description']; ?></p>
        <div class="stars">
            <?php
            // Anda bisa menambahkan logika untuk menampilkan bintang rating di sini
            ?>
        </div>
    </div>
    <?php
    } else {
        // Tampilkan pesan jika tidak ada produk yang ditemukan
        echo "Product not found.";
    }
    ?>
</div>

</div>
<div class="form-group">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
</div>
<input type="hidden" id="id_product" name="id_product" value="<?php echo isset($id_product) ? $id_product : ''; ?>" required>
<div class="form-group">
<label for="product_name">Product:</label>
<input type="text" id="product_name" name="product_name" value="<?php echo isset($product_name) ? $product_name : ''; ?>" readonly>

</div>
    <br>
    <div class="form-group">
    <label for="price">Price:</label>
    <input type="text" id="price" name="price" value="<?php echo isset($price) ? $price : '0'; ?>" readonly>
    </div>
    <br>
    <div class="form-group">
        <label for="amount_product">Amount Product:</label>
        <input type="number" id="amount_product" name="amount_product" min="1" required>
    </div>
    <br>
    <div class="form-group">
        <label for="total_price">Total Price:</label>
        <input type="text" id="total_price" name="total_price" readonly>
    </div>
    <br>
    <div class="form-group">
        <label for="addres">Addres:</label>
        <input type="text" id="addres" name="address" required>
    </div>
    <br>
    <div class="form-group">
        <label for="transaction_method">Transaction Method:</label>
        <select id="transaction_method" name="transaction_method" required>
            <option value="Cash">COD</option>
            <option value="Debit">Debit</option>
            <option value="Credit">Credit</option>
        </select>
    </div>
    <br>
    <button type="submit" name="submit" class="button-buy">Buy Now</button>
</form>

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

    <script>
        // Wait for the document to fully load before executing JavaScript
        document.addEventListener("DOMContentLoaded", function() {
            // Get the select element
            var selectElement = document.getElementById("id_product");

            // Set the width of each option
            for (var i = 0; i < selectElement.options.length; i++) {
                var option = selectElement.options[i];
                option.style.width = "200px"; // Set the width here
            }
        });
    </script>
    
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

<script>
   function getHargaBarang() {
    var idBarang = document.getElementById("id_product").value;
    var hargaBarang = document.getElementById("price");

    if (idBarang) {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "getprice.php?id=" + idBarang, true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Assuming the server returns the price in the format $xx.xx
                var priceText = xhr.responseText;
                // Remove dollar sign and thousand separator (comma or dot)
                var cleanPrice = priceText.replace(/[$,]/g, '');
                hargaBarang.value = cleanPrice;
                updateTotalHarga();
            }
        };
        xhr.send();
    } else {
        hargaBarang.value = "";
        updateTotalHarga();
    }
}

function updateTotalHarga() {
    var jumlah = parseInt(document.getElementById("amount_product").value) || 0;
    var harga = parseFloat(document.getElementById("price").value.replace(/[$,]/g, '')) || 0; // Clean up the price value
    var total = harga * jumlah;

    document.getElementById("total_price").value = total.toFixed(2); // Set to 2 decimal places for currency format
}

document.getElementById("amount_product").addEventListener("input", updateTotalHarga);
document.getElementById("id_product").addEventListener("change", getHargaBarang);

 // Set the current date and time for the order_date input
 function setCurrentDateTime() {
            var now = new Date();
            var year = now.getFullYear();
            var month = ('0' + (now.getMonth() + 1)).slice(-2);
            var day = ('0' + now.getDate()).slice(-2);
            var hours = ('0' + now.getHours()).slice(-2);
            var minutes = ('0' + now.getMinutes()).slice(-2);

            var currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;
            document.getElementById("order_date").value = currentDateTime;
        }

        // Call setCurrentDateTime when the page loads
        window.onload = setCurrentDateTime;

</script>
</body>
</html>
