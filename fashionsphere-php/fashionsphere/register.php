<?php
session_start();

if(isset($_POST["Name"]) && isset($_POST["Email"]) && isset($_POST["Username"])&&isset($_POST["Password"]))
{
    $Name=$_POST["Name"];
    $Email=$_POST["Email"];
    $Username=$_POST["Username"];
    $Password=$_POST["Password"];

    try{
        $connect=mysqli_connect("localhost","root","","fashionsphere");

        $req="insert into users (Name,Email, Username, Password) values ('$Name','$Email', '$Username', '$Password')";
        mysqli_query($connect,$req);

        $req0="SELECT * FROM users WHERE Username='$Username' and Password='$Password'";
        $results= mysqli_query($connect,$req0);
        $user = mysqli_fetch_assoc($results);
        $_SESSION['user_id'] = $user['ID'];

        $_SESSION['message'] = "inscription reussi,bienvenue a FashionSphere";
        header("Location: home.php");
        exit();
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
        <h2>registration form</h2>
    </section>

    <section class="section">
        <form method="post" action="register.php">
            <label for="Name">Name</label> <br>
            <input type="text" name="Name" id="Name" required> <br><br>

            <label for="Email">Email</label> <br>
            <input type="email" name="Email" id="Email" required> <br><br>

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

            <input type="submit" class="button0" value="register"><br><br>
        </form>
        <a href="login.php" class="back">back to login</a>
    </section>

</body>
</html>
