<?php
session_start();

if(isset($_POST["Username"])&&isset($_POST["Password"]))
{
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];

    try{
        $connect=mysqli_connect("localhost","root","","fashionsphere");

        $req="SELECT * FROM admins WHERE Username='$Username' and Password='$Password'";
        $results= mysqli_query($connect,$req);

        if(mysqli_num_rows($results)>0)
        {
            header("Location: admin_space.php");
            $_SESSION['message'] = "bienvenue dans votre espace admin";
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
    <link rel="stylesheet" href="login.css">
</head>
<body class="background">

    <section class="logo-section">
        <img src="image/img.png" class="logo">
        <h2>Admin area</h2>
    </section>

    <section class="section">
        <form method="post" action="loginadmin.php">
            <label for="Username">Username</label> <br>
            <input type="text" name="Username" id="Username" required> <br><br>

            <label for="Password">Password</label> <br>
            <input type="password" name="Password" id="Password" required> <br><br>

            <div name="message" class="message">
            <?php if (isset($_SESSION['message'])) {
               echo $_SESSION['message'];
               unset($_SESSION['message']);
            } ?>
            </div>

            <input type="submit" class="button0" value="Login"><br><br>
        </form>
        <a href="login.php" class="back">back to login</a>
    </section>

</body>
</html>
