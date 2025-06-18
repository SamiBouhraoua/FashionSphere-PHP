<?php
session_start();

$connect = mysqli_connect("localhost", "root", "", "fashionsphere");

$req = "SELECT * FROM users";
$results = mysqli_query($connect, $req);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="users.css">
</head>
<body>
    <header class="header">
        <div class="header-content">
            <img src="image/img.png" class="header_logo" alt="FashionSphere Logo">
            <span class="FashionSphere">FashionSphere</span>
            <nav class="navbar">
                <a href="users.php"><i class="fas fa-users"></i> Users</a>
                <a href="products.php"><i class="fas fa-box-open"></i> Products</a>
                <a href="home.php"><i class="fas fa-sign-in-alt"></i> Logout</a>
            </nav>
        </div>
    </header>

    <div class="message">
        <?php if (isset($_SESSION['message'])) {
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        } ?>
    </div>

    <a href="add_user.php" style="text-decoration: none;"><button class="add-btn">Add a new user</button></a>


    <section>
        <div class="users-container">
            <?php while ($user = mysqli_fetch_assoc($results)): ?>
                <div class="user-item">
                    <h3>Name : <?php echo htmlspecialchars($user['Name']); ?></h3>
                    <p>Email : <?php echo htmlspecialchars($user['Email']); ?></p>
                    <p>Username : <?php echo htmlspecialchars($user['Username']); ?></p>
                    <p>Password : <?php echo htmlspecialchars($user['Password']); ?></p>
                    <div class="user-actions">
                        <a href="edit_user.php?id=<?php echo $user['ID']; ?>"><button class="edit-btn">Edit</button></a>
                        <a href="delete_user.php?id=<?php echo $user['ID']; ?>"><button class="delete-btn">Delete</button></a>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
    </section>
</body>
</html>
