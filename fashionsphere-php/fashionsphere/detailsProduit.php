<?php
$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    
    $req = "SELECT * FROM products WHERE id = $product_id";
    $result = mysqli_query($connect, $req);

    if ($result) {
        $product = mysqli_fetch_assoc($result);

        if ($product) {
            $product_Categorie = htmlspecialchars($product['categorie']);
            $product_Titre = htmlspecialchars($product['Titre']);
            $product_Description = htmlspecialchars($product['Description']);
            $product_Prix = number_format($product['Prix'], 2);
            $product_Taille = htmlspecialchars($product['Taille']);
            $product_Stock = htmlspecialchars($product['Stock']);
            $product_photo = htmlspecialchars($product['Photo']);
        } 
        else 
        {
            echo "Produit non trouvé.";
        }
    } 
    else 
    {
        echo "Erreur lors de la récupération des données.";
    }
} 
else {
    echo "Aucun identifiant de produit spécifié.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du produit</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Details.css">
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
                <a href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
            </nav>
        </div>
    </header>

    <section class="product-details">
        <?php if (isset($product)): ?>
            <div class="product-detail-item">
                <img src="image/<?php echo $product_photo; ?>">
                <h2><?php echo $product_Titre; ?></h2>
                <p><?php echo $product_Description; ?></p>
                <p>Prix: <?php echo $product_Prix; ?> $</p>
                <p>Catégorie: <?php echo $product_Categorie; ?></p>
                <p>Taille: <?php echo $product_Taille; ?></p>
                <p>Stock disponible: <?php echo $product_Stock; ?></p>
                
                <?php 
                // vérification du stock
                if ($product['Stock'] > 0) {
                    echo "<form method='post' action='cart.php'>";
                    echo "<input type='hidden' name='idproduit' value='{$product['ID']}'>";
                    echo "<label for='quantite'>Choisissez la quantité que vous voulez commander : </label>";
                    echo "<select id='quantite' name='quantite'>";
                    for ($i = 1; $i <= $product['Stock'] && $i <= 5; $i++) {
                        echo "<option value='$i'>$i</option>";
                    }
                    echo "</select><br>";
                    echo "<input type='submit' name='ok_quantite' value='Ajouter au panier'>";
                    echo "</form>";
                } else {
                    echo "<p>Rupture de stock</p>";
                }
                ?>
            </div>
        <?php endif; ?>
    </section>

</body>
</html>
<?php
$connect = new mysqli("localhost", "root", "", "fashionsphere");

if ($connect->connect_error) {
    die("Erreur de connexion : " . $connect->connect_error);
}

$product = null;

if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $req = "SELECT * FROM products WHERE id = $product_id";
    $result = $connect->query($req);

    if ($result && $product = $result->fetch_assoc()) {
        $product_Categorie = htmlspecialchars($product['categorie']);
        $product_Titre = htmlspecialchars($product['Titre']);
        $product_Description = htmlspecialchars($product['Description']);
        $product_Prix = number_format($product['Prix'], 2);
        $product_Taille = htmlspecialchars($product['Taille']);
        $product_Stock = htmlspecialchars($product['Stock']);
        $product_photo = htmlspecialchars($product['Photo']);
    } else {
        echo "<p>Produit non trouvé.</p>";
    }
} else {
    echo "<p>Aucun identifiant de produit spécifié.</p>";
}
?>
