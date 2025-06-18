<?php
session_start();
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
            $product_Photo = htmlspecialchars($product['Photo']);
        } 
        else {
            $_SESSION['message'] = "Produit non trouvé.";
        }
    } 
    else {
        $_SESSION['message'] = "Erreur lors de la récupération des données.";
    }
} 
else {
    $_SESSION['message'] = "Aucun identifiant de produit spécifié.";
}

if (isset($_POST["Titre"], $_POST["Description"], $_POST["Prix"], $_POST["Categorie"], $_POST["Stock"])) {
    try {
        $Titre = $_POST["Titre"];
        $Description = $_POST["Description"];
        $Prix = $_POST["Prix"];
        $Categorie = $_POST["Categorie"];
        $Stock = $_POST["Stock"];
        
        $Photo = $product_Photo;
        
        if (isset($_FILES["Photo"]) && $_FILES["Photo"]["error"] === UPLOAD_ERR_OK) {
            $tmp_name = $_FILES["Photo"]["tmp_name"];
            $file_name = uniqid() . "-" . $_FILES["Photo"]["name"];
            $upload_dir = "image/";

            $destination = $upload_dir . $file_name;
            move_uploaded_file($tmp_name, $destination);

            $Photo = $file_name;
        }

        $req = "UPDATE products SET Titre = '$Titre', Prix = '$Prix', Description = '$Description', Categorie = '$Categorie', Stock = '$Stock', Photo = '$Photo' WHERE id = $product_id";
        $result = mysqli_query($connect, $req);

        if ($result) {
            $_SESSION['message'] = "Mise à jour avec succès.";
            header("Location: products.php");
            exit;
        } else {
            $_SESSION['message'] = "Erreur lors de la mise à jour du produit.";
        }
    }
    catch (Exception $e) {
        $_SESSION['message'] = "Erreur dans le code: " . $e->getMessage();
    } 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Édition du produit</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Edit.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="image/img.png" class="header_logo" alt="FashionSphere Logo">
            <span class="FashionSphere">FashionSphere</span>
            <nav class="navbar">
                <a href="users.php"><i class="fas fa-users"></i> Users</a>
                <a href="products.php"><i class="fas fa-box-open"></i> Products</a>
                <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
            </nav>
        </div>
    </header>

    <div name="message" class="message">
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } ?>
    </div>

    <section class="edit-product">
        <div class="edit-product-form">
            <h2>Édition du produit</h2>
            <form action="edit.php?id=<?php echo $product_id; ?>" method="post" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?php echo $product_id; ?>">

                <img class="image" src="image/<?php echo $product_Photo; ?>">

                <label for="Titre">Titre :</label>
                <input type="text" name="Titre" value="<?php echo $product_Titre; ?>" required>
                
                <label for="Description">Description :</label>
                <textarea name="Description" required><?php echo $product_Description; ?></textarea>
                
                <label for="Prix">Prix :</label>
                <input type="number" name="Prix" value="<?php echo $product_Prix; ?>" step="0.01" required>
                
                <label for="Categorie">Catégorie :</label>
                <select name="Categorie" required>
                    <option value="men" <?php if ($product_Categorie == 'men') echo 'selected'; ?>>Men</option>
                    <option value="women" <?php if ($product_Categorie == 'women') echo 'selected'; ?>>Women</option>
                    <option value="accessories" <?php if ($product_Categorie == 'accessories') echo 'selected'; ?>>Accessories</option>
                </select>
                
                <label for="Taille">Taille :</label>
                <input type="text" name="Taille" value="<?php echo $product_Taille; ?>" required>
                
                <label for="Stock">Stock :</label>
                <input type="number" name="Stock" value="<?php echo $product_Stock; ?>" required>
                
                <label for="Photo">saisir une autre image :</label>
                <input type="file" name="Photo">
                
                <button type="submit" name="edit">Mettre à jour</button>
            </form>
        </div>
    </section>
</body>
</html>
