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
                <a href="users.php"><i class="fas fa-home"></i> Users</a>
                <a href="products.php"><i class="fas fa-box-open"></i> Products</a>
                <a href="home.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
            </div>
        <?php endif; ?>
    </section>

</body>
</html>
