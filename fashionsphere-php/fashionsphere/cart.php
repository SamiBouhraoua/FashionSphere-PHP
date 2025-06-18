<?php
session_start();
require("panierFonction.php");
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    $_SESSION['message0'] = "Veuillez vous connecter pour accéder au panier.";
    exit;
}

if (!isset($_SESSION['panier'])) {
    creationDuPanier();
}
if (isset($_POST['ok_quantite'])) {
    $mysqli = new mysqli("localhost", "root", "", "fashionsphere");
    if ($mysqli->connect_error) {
        die('Erreur lors de la connexion à la base de données : ' . $mysqli->connect_error);
    }
    $idProduit = intval($_POST['idproduit']);
    $req = "SELECT * FROM products WHERE ID='$idProduit'";
    $resultat = $mysqli->query($req) or die("Erreur SQL : " . $mysqli->error);

    if ($produit = $resultat->fetch_assoc()) {
        ajouterProduitDansPanier($produit['Titre'], $produit['Description'], $produit['ID'], $_POST['quantite'], $produit['Prix']);
    }
    header('Location: cart.php');
    exit;
}

if (isset($_GET['id_produit_supprimer'])) {
    $idproduit = intval($_GET['id_produit_supprimer']);
    retirerproduitDuPanier($idproduit);
    header('Location: cart.php');
    exit;
}

if (isset($_POST['vider_panier'])) {
    viderPanier();
    header('Location: cart.php');
    exit;
}

if (isset($_POST['increase_quantity'])) {
    $idProduit = intval($_POST['increase_quantity']);
    $index = array_search($idProduit, $_SESSION['panier']['ID']);
    if ($index !== false) {
        $_SESSION['panier']['quantite'][$index]++;
    }
    header('Location: cart.php');
    exit;
}

if (isset($_POST['decrease_quantity'])) {
    $idProduit = intval($_POST['decrease_quantity']);
    $index = array_search($idProduit, $_SESSION['panier']['ID']);
    if ($index !== false && $_SESSION['panier']['quantite'][$index] > 1) {
        $_SESSION['panier']['quantite'][$index]--;
    }
    header('Location: cart.php');
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="cart.css">
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
</body>
</html>
<?php


echo "<table border='1' style='border-collapse: collapse; width: 100%; text-align: center;' cellpadding='7'>";
echo "<thead>";
echo "<tr style='background-color: #f2f2f2; font-weight: bold;'>";
echo "<td colspan='6' style='font-size: 18px;'>Panier</td>";
echo "</tr>";
echo "<tr style='background-color: #e6e6e6;'>";
echo "<th>Titre</th><th>Description</th><th>ID</th><th>Quantité</th><th>Prix (CAD)</th><th>Actions</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";

if (empty($_SESSION['panier']['ID'])) { 
    echo "<tr>";
    echo "<td colspan='6' style='color: #a94442; font-weight: bold;'>Votre panier est vide</td>";
    echo "</tr>";
} else {
    for ($i = 0; $i < count($_SESSION['panier']['ID']); $i++) {
        $idprod = $_SESSION['panier']['ID'][$i];
        echo "<tr>";
        echo "<td>" . htmlspecialchars($_SESSION['panier']['Titre'][$i]) . "</td>";
        echo "<td>" . htmlspecialchars($_SESSION['panier']['Description'][$i]) . "</td>";
        echo "<td>" . htmlspecialchars($_SESSION['panier']['ID'][$i]) . "</td>";
        echo "<td>";
        echo '<form method="post" action="cart.php" style="display: inline-block;">';
        echo '<button type="submit" name="decrease_quantity" value="' . $idprod . '" style="background-color: #ff6666; color: white; border: none; padding: 15px;margin: 5px;margin-right: 10px; cursor: pointer;">-</button>';
        echo '</form>';
        echo htmlspecialchars($_SESSION['panier']['quantite'][$i]);
        echo '<form method="post" action="cart.php" style="display: inline-block;">';
        echo '<button type="submit" name="increase_quantity" value="' . $idprod . '" style="background-color: #4CAF50; color: white; border: none; padding: 15px;margin: 5px;margin-left: 10px; cursor: pointer;">+</button>';
        echo '</form>';
        echo "</td>";        echo "<td>" . htmlspecialchars(number_format($_SESSION['panier']['Prix'][$i], 2)) . "</td>";
        echo "<td>";
        echo "<a href='cart.php?id_produit_supprimer=" . urlencode($idprod) . "'>
                <button style='background-color: #ff6666; color: white; border: none; padding: 5px 10px; cursor: pointer;'>Supprimer</button>
              </a>";
        echo "</td>";
        echo "</tr>";
    }
    
    echo "<tr style='font-weight: bold; background-color: #f9f9f9;'>";
    echo "<td colspan='4' style='text-align: right;'>Total :</td>";
    echo "<td colspan='2'>" . htmlspecialchars(number_format(montantTotal(), 2)) . " CAD</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td colspan='6' style='text-align: center;'>";
    echo '<form method="post" action="" style="display: inline-block;">';
    echo '<input type="submit" name="vider_panier" value="Vider mon panier" style="background-color: #d9534f;border-radius: 25px; color: white; border: none; padding: 10px 20px; cursor: pointer;">';
    echo '</form>';
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td colspan='6' style='text-align: center;'>";
    echo '<form method="post" action="paiement.php" style="display: inline-block;">';
    echo '<input type="submit" name="payer" value="Payer avec cart" style="background-color: #4CAF50; color: white;border-radius: 25px; border: none; padding: 15px 25px; cursor: pointer;">';
    echo '</form>';
    echo "</td>";
    echo "</tr>";

}

echo "</tbody>";
echo "</table><br />";
echo "<p style='font-style: italic;'>Règlement par CHÈQUE uniquement à l'adresse suivante : 3030 rue Hochelaga</p>";

?>
