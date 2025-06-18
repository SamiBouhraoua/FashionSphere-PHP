<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Home.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="image/img.png" class="header_logo" alt="FashionSphere Logo">
            <span class="FashionSphere">FashionSphere</span>
            <nav class="navbar">
                <a href="home.php"><i class="fas fa-home"></i> Home</a>
                <div class="dropdown">
                    <a href="#"><i class="fas fa-box-open"></i> Product</a>
                    <div class="dropdown-content">
                        <a href="mens.php">Men's Wear</a>
                        <a href="womens.php">Women's Wear</a>
                        <a href="accessories.php">Accessories</a>
                    </div>
                </div>
                <a href="cart.php"><i class="fas fa-shopping-cart"></i> Cart</a>
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="Logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            <?php else: ?>
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
            <?php endif; ?>            </nav>
        </div>
    </header>
    <section class="hero">
        <div class="category menswear">
          <h2>Menswear</h2>
          <a href="mens.php"><button>Shop now</button></a>
        </div>
        <div class="category womenswear">
          <h2>Womenswear</h2>
          <a href="womens.php"><button>Shop now</button></a>
        </div>
      </section>

       <div name="message" class="message">
            <?php if (isset($_SESSION['message'])) {
               echo $_SESSION['message'];
               unset($_SESSION['message']);
            } ?>
        </div>

      <section class="accessories">
        <h2>Accessories</h2>
        <div class="accessories-container">
            <div class="accessory-item">
                <a href="accessories.php"><img src="image/img3.png" alt="Accessory 1"></a>
                <h3>Stylish Bag</h3>
            </div>
            <div class="accessory-item">
                <a href="accessories.php"><img src="image/img2.png" alt="Accessory 2"></a>
                <h3>Beanie</h3>
            </div>
            <div class="accessory-item">
                <a href="accessories.php"><img src="image/img1.png" alt="Accessory 3"></a>
                <h3>Bag</h3>
            </div>
        </div>
        <a href="accessories.php"><button class="accessories-btn">Shop All Accessories</button></a>
    </section>
    
</body>
</html>
