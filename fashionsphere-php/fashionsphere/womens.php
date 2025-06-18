<?php
session_start();
$connect=mysqli_connect("localhost","root","","fashionsphere");
    
$req="SELECT * FROM products WHERE categorie='women'";
$results= mysqli_query($connect,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="product.css">
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
    <section class="men">
        <div class="container">
            <div class="men-item">
                <img src="image/w1.png" alt="Image 1">
            </div>
            <div class="men-item">
                <div class="overlay">
                    <h2>womens</h2>
                    <img src="image/w2.png" alt="Image 2">
                </div>
            </div>
            <div class="men-item">
                <div class="overlay">
                    <h2>Wear</h2>
                    <img src="image/w3.png" alt="Image 3">
                </div>
            </div>
            <div class="men-item">
                <img src="image/w4.png" alt="Image 4">
            </div>
        </div>
    </section> 
    <h2 class="h2p">All items</h2> 
    <section class="products">
        <div class="products-container">
            <?php while ($product = mysqli_fetch_assoc($results)): ?>
                <div class="product-item">
                    <img src="image/<?php echo $product['Photo']; ?>">
                    <h3><?php echo $product['Description']; ?></h3>
                    <p><?php echo number_format($product['Prix']); ?> $</p>
                    <a href="detailsProduit.php?id=<?php echo $product['ID'];?>"><button class="shop-now-btn">Shop now</button></a>
                </div>
            <?php endwhile; ?>
        </div>
    </section> 
</body>
</html>
