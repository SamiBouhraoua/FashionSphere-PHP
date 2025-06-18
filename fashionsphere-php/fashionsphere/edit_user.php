<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

if (isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
    $req = "SELECT * FROM users WHERE ID = $user_id";
    $result = mysqli_query($connect, $req);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        if ($user) {
            $user_Name = htmlspecialchars($user['Name']);
            $user_Email = htmlspecialchars($user['Email']);
            $user_Username = htmlspecialchars($user['Username']);
            $user_Password = htmlspecialchars($user['Password']);
        } else {
            $_SESSION['message'] = "Utilisateur non trouvé.";
        }
    } else {
        $_SESSION['message'] = "Erreur lors de la récupération des données de l'utilisateur.";
    }
} else {
    $_SESSION['message'] = "Aucun identifiant d'utilisateur spécifié.";
}

if (isset($_POST["Name"], $_POST["Email"], $_POST["Username"], $_POST["Password"])) {
    try {
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Username = $_POST["Username"];
        $Password = $_POST["Password"];
        
        $req = "UPDATE users SET Name = '$Name', Email = '$Email', Username = '$Username', Password = '$Password' WHERE ID = $user_id";
        $result = mysqli_query($connect, $req);

        if ($result) {
            $_SESSION['message'] = "Mise à jour avec succès.";
            header("Location: users.php");
            exit;
        } else {
            $_SESSION['message'] = "Erreur lors de la mise à jour de l'utilisateur.";
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Erreur dans le code: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Édition de l'utilisateur</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="Edit_user.css">
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

    <div class="message">
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } ?>
    </div>

    <section class="edit-user">
        <div class="edit-user-form">
            <h2>Édition de l'utilisateur</h2>
            <form action="edit_user.php?id=<?php echo $user_id; ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $user_id; ?>">

                <label for="Name">Nom :</label><br>
                <input type="text" name="Name" value="<?php echo $user_Name; ?>" required><br><br>

                <label for="Email">Email :</label><br>
                <input type="email" name="Email" value="<?php echo $user_Email; ?>" required><br><br>

                <label for="Username">Nom d'utilisateur :</label><br>
                <input type="text" name="Username" value="<?php echo $user_Username; ?>" required><br><br>

                <label for="Password">Mot de passe :</label><br>
                <input type="password" name="Password" value="<?php echo $user_Password; ?>" required><br><br>

                <button type="submit" name="edit">Mettre à jour</button>
            </form>
        </div>
    </section>
</body>
</html>
