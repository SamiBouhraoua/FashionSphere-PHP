<?php
session_start();

$connect=mysqli_connect("localhost","root","","fashionsphere");
    
$req="SELECT * FROM products";
$results= mysqli_query($connect,$req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Admin_space.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="image/img.png" class="header_logo" alt="FashionSphere Logo">
            <span class="FashionSphere">FashionSphere</span>
            <nav class="navbar">
                <a href="users.php"><i class="fas fa-users"></i> users</a>
                <a href="products.php"><i class="fas fa-box-open"></i> products</a>
                <a href="home.php"><i class="fas fa-sign-in-alt"></i> logout</a>
            </nav>
        </div>
    </header>

    <div name="message" class="message">
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } ?>
    </div>

    <a href="add.php" style="text-decoration: none;"><button class="add-btn">Add a new product</button></a>

    <section>
        <div class="products-container">
            <?php while ($product = mysqli_fetch_assoc($results)): ?>
                <div class="product-item">
                    <img src="image/<?php echo $product['Photo']; ?>">
                    <h3><?php echo $product['Description']; ?></h3>
                    <p><?php echo number_format($product['Prix']); ?> $</p>
                    <div class="product-actions">
                        <a href="details.php?id=<?php echo $product['ID']; ?>"><button class="details-btn">Details</button></a>
                        <a href="edit.php?id=<?php echo $product['ID']; ?>"><button class="edit-btn">Edit</button></a>
                        <a href="delete.php?id=<?php echo $product['ID']; ?>"><button class="delete-btn">Delete</button></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section> 
</body>
</html>