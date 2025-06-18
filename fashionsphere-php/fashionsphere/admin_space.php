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
    <link rel="stylesheet" href="Admin_space.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="image/img.png" class="header_logo" alt="FashionSphere Logo">
            <span class="FashionSphere">FashionSphere</span>
            <nav class="navbar">
                <a href="users.php"><i class="fas fa-home"></i> users</a>
                <a href="products.php"><i class="fas fa-home"></i> products</a>
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

    <main class="content">
        <section class="users">
            <h2>Users</h2>
            <p>View and manage user accounts</p>
            <a href="users.php" class="button">View Users</a>
        </section>

        <section class="products">
            <h2>Products</h2>
            <p>Manage your product inventory, add, update, or delete products.</p>
            <a href="products.php" class="button">View Products</a>
        </section>
    </main>
</body>
</html>
