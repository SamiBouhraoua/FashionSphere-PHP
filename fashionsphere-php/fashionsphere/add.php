<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

if (isset($_POST["Titre"], $_POST["Description"], $_POST["Prix"], $_POST["Categorie"], $_POST["Stock"],$_POST["Photo"])) 
{
    try {
        $Titre = $_POST["Titre"];
        $Description = $_POST["Description"];
        $Prix = $_POST["Prix"];
        $Categorie = $_POST["Categorie"];
        $Stock = $_POST["Stock"];     
        $Photo = $_POST["Photo"];


        $req = "INSERT INTO products (Titre, Prix, Description, categorie, Stock, Photo) VALUES ('$Titre', '$Prix', '$Description', '$Categorie', '$Stock', '$Photo')";
        $result = mysqli_query($connect, $req);

        if ($result) {
            $_SESSION['message'] = "Produit ajouté avec succès.";
            header("Location: products.php");
            exit;
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout du produit.";
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Erreur dans le code: " ;
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
    <link rel="stylesheet" href="edit.css">
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
            <h2>Add a product</h2>
            <form action="add.php" method="post">
                <label for="Titre">Titre :</label>
                <input type="text" name="Titre" required>
                
                <label for="Description">Description :</label>
                <textarea name="Description" required></textarea>
                
                <label for="Prix">Prix :</label>
                <input type="number" name="Prix" step="0.01" required>
                
                <label for="Categorie">Catégorie :</label>
                <select name="Categorie" required>
                    <option value="men" >Men</option>
                    <option value="women" >Women</option>
                    <option value="accessories">Accessories</option>
                </select>
                
                <label for="Taille">Taille :</label>
                <input type="text" name="Taille" required>
                
                <label for="Stock">Stock :</label>
                <input type="number" name="Stock" required>
                
                <label for="Photo">saisir une image :</label>
                <input type="file" name="Photo" required>
                
                <button type="submit" name="edit">Add</button>
            </form>
        </div>
    </section>
</body>
</html>
