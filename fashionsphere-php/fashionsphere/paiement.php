<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cardName = $_POST['cardName'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    if (!empty($cardName) && !empty($cardNumber) && !empty($expiryDate) && !empty($cvv)) {
        $_SESSION['message'] = "Paiement réussi ! Merci pour votre achat.";
    } 

    header('Location: paiement.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionSphere</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="paiement.css">
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
            <?php endif; ?>
            </nav>
        </div>
    </header>

    <div name="message" class="message">
            <?php if (isset($_SESSION['message'])) {
               echo $_SESSION['message'];
               unset($_SESSION['message']);
            } ?>
        </div>

    <div class="container mt-5">
        <h1 class="text-center">Paiement</h1>
        <form method="post" action="paiement.php" class="max-w-xs mx-auto">
            <div class="group">
                <div class="flex flex-col justify-around bg-gray-800 p-4 border border-white border-opacity-30 rounded-lg shadow-md max-w-xs mx-auto">
                    <div class="flex flex-row items-center justify-between mb-3">
                        <input class="input w-full h-10 border-none outline-none text-sm bg-gray-800 text-white font-semibold caret-orange-500 pl-2 mb-3 flex-grow" type="text" name="cardName" id="cardName" placeholder="Full Name" required>
                        <div class="flex items-center justify-center relative w-14 h-9 bg-gray-800 border border-white border-opacity-20 rounded-md">
                            <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 48 48">
                                <path fill="#ff9800" d="M32 10A14 14 0 1 0 32 38A14 14 0 1 0 32 10Z"></path>
                                <path fill="#d50000" d="M16 10A14 14 0 1 0 16 38A14 14 0 1 0 16 10Z"></path>
                                <path fill="#ff3d00" d="M18,24c0,4.755,2.376,8.95,6,11.48c3.624-2.53,6-6.725,6-11.48s-2.376-8.95-6-11.48 C20.376,15.05,18,19.245,18,24z"></path>
                            </svg>
                        </div>
                    </div>
                    <div class="flex flex-col space-y-3">
                        <input class="input w-full h-10 border-none outline-none text-sm bg-gray-800 text-white font-semibold caret-orange-500 pl-2" type="text" name="cardNumber" id="cardNumber" placeholder="0000 0000 0000 0000" required>
                        <div class="flex flex-row justify-between">
                            <input class="input w-full h-10 border-none outline-none text-sm bg-gray-800 text-white font-semibold caret-orange-500 pl-2" type="text" name="expiryDate" id="expiryDate" placeholder="MM/AA" required>
                            <input class="input w-full h-10 border-none outline-none text-sm bg-gray-800 text-white font-semibold caret-orange-500 pl-2" type="text" name="cvv" id="cvv" placeholder="CVV" required>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-primary buy" value="Payer">
        </form>
    </div>
</body>
</html>
