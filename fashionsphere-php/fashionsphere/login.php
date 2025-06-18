<?php
session_start();

if(isset($_POST["Username"])&&isset($_POST["Password"]))
{
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];

    try{
        $connect=mysqli_connect("localhost","root","","fashionsphere");

        $req="SELECT * FROM users WHERE Username='$Username' and Password='$Password'";
        $results= mysqli_query($connect,$req);

        if(mysqli_num_rows($results)>0)
        {
            $user = mysqli_fetch_assoc($results);
            $_SESSION['user_id'] = $user['ID'];
            $_SESSION['message'] = "bienvenue a FashionSphere";

            header("Location: home.php");
            exit();
        }
        else{
            $_SESSION['message'] = "login ou password incorrecte";
        }
    }
    catch(Exception $e)
    {
        $_SESSION['message'] = "Erreur dans le code la selection";
    } 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="login.css">
</head>
<body class="background">
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

    <div name="message0" class="message0" style="display: flex;justify-content: center;align-items: center;text-align: center;color: #000000;margin: 20px auto;font-family: Georgia, 'Times New Roman', Times, serif;font-size: 2.2em;">
            <?php if (isset($_SESSION['message0'])) {
               echo $_SESSION['message0'];
               unset($_SESSION['message0']);
            } ?>
            </div>

    <section class="logo-section">
        <h2>Sing up to FashionSphere</h2>
    </section>

    <section class="section">
        <form method="post" action="login.php">
            <label for="Username">Username</label> <br>
            <input type="text" name="Username" id="Username"  required> <br><br>

            <label for="Password">Password</label> <br>
            <input type="password" name="Password" id="Password"  required> <br><br>

            <div name="message" class="message">
            <?php if (isset($_SESSION['message'])) {
               echo $_SESSION['message'];
               unset($_SESSION['message']);
            } ?>
            </div>

            <input type="submit" class="button0" value="Login">
        </form>
    </section>

    <section class="section-extra">
        <p>Create a new account or access the admin area. </p>
        <div class="actions">
            <a href="register.php" class="button1">Register</a>
            <a href="loginadmin.php" class="button1">Admin area</a>
        </div>
    </section>

</body>
</html>
