<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

if (isset($_POST["Name"], $_POST["Email"], $_POST["Password"], $_POST["Username"])) 
{
    try {
        $Name = $_POST["Name"];
        $Email = $_POST["Email"];
        $Password = $_POST["Password"];
        $Username = $_POST["Username"];

        $req = "INSERT INTO users (Name, Email, Password, Username) VALUES ('$Name', '$Email', '$Password', '$Username')";
        $result = mysqli_query($connect, $req);

        if ($result) {
            $_SESSION['message'] = "Utilisateur ajouté avec succès.";
            header("Location: users.php");
            exit;
        } else {
            $_SESSION['message'] = "Erreur lors de l'ajout de l'utilisateur.";
        }
    } catch (Exception $e) {
        $_SESSION['message'] = "Erreur dans le code.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un utilisateur</title>
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
            <h2>Add a User</h2>
            <form action="add_user.php" method="post">
                <label for="Name">Name :</label>
                <input type="text" name="Name" required>

                <label for="Email">Email :</label>
                <input type="email" name="Email" required>

                <label for="Username">Username :</label>
                <input type="text" name="Username" required>

                <label for="Password">Password :</label>
                <input type="password" name="Password" required>


                <button type="submit" name="add">Add</button>
            </form>
        </div>
    </section>
</body>
</html>
