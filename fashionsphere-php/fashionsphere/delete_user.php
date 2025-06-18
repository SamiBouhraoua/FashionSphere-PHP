<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);

    $req = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($connect, $req);

    if ($user = mysqli_fetch_assoc($result)) {
        $user_name = htmlspecialchars($user['Name']);
    } 
    else {
        $_SESSION['message'] = "user non trouvé.";
        header("Location: users.php");
        exit;
    }
} else {
    $_SESSION['message'] = "Aucun produit spécifié.";
    header("Location: users.php");
    exit;
}

if (isset($_POST['confirm'])) {
    $req = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($connect, $req)) {
        $_SESSION['message'] = "Produit supprimé avec succès.";
        header("Location: users.php");
        exit;
    } else {
        $_SESSION['message'] = "Erreur lors de la suppression du produit.";
        header("Location: users.php");
        exit;
    }
}

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

    <div class="confirmation-message">
        <p>Êtes-vous sûr de vouloir supprimer le user "<strong><?php echo $user_name; ?></strong>" ?</p>
        <form action="delete_user.php?id=<?php echo $user_id; ?>" method="post">
            <button type="submit" name="confirm" class="btn btn-danger">Oui, supprimer</button>
            <a href="users.php" class="btn btn-cancel">Non, annuler</a>
        </form>
    </div>

</body>
</html>