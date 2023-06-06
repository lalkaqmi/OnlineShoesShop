<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/56eb3b1966.js" crossorigin="anonymous"></script>
    <title>BestShoes - Cart</title>
    <link rel="stylesheet" href="checkout.css">

</head>
<body>
<div class="header">
    <div class="navbar">
        <div class="toggle_btn">
            <i class="fa-solid fa-bars"></i>
        </div>
        <ul class="links">
            <li><a href="sale">SALE</a></li>
            <li><a href="lastest">LASTEST</a></li>
            <li><a href="brands">BRANDS<i class="fa-solid fa-plus"></i></a></li>
            <li><a href="categories.html">CATEGORIES<i class="fa-solid fa-plus"></i></a></li>
        </ul>
        <div class="logo"><a href="index.php"><img src="icon.png" alt=""></a></div>
        <ul class="links1">
            <li><a href="about">ABOUT US</a></li>
            <li><a href="news">NEWS</a></li>
        </ul>
        <ul class="links2">
            <div class="shopping">
                <li><a href="#"><i class="fa-solid fa-cart-shopping"> </i> <span class="quantity">0</span> </a></li>
            </div>
            <div class="my_acc"><li><a href="form/registration.php"><i class="fa-solid fa-user"></i></a></li></div>
            <li><a href="find"><i class="fa-solid fa-magnifying-glass"></i></a></li>
        </ul>
        <div class="dropdown_menu">
            <li><a href="sale">SALE</a></li>
            <li><a href="lastest">LASTEST</a></li>
            <li><a href="brands">BRANDS<i class="fa-solid fa-plus"></i></a></li>
            <li><a href="categories">CATEGORIES<i class="fa-solid fa-plus"></i></a></li>
            <li><a href="about">ABOUT US</a></li>
            <li><a href="news">NEWS</a></li>
            <li><a href="form/registration.php">My Account</a></li>
        </div>
    </div>
</div>
<div class="container">
    <!-- Cart items displayed here -->
</div>
<div class="checkout-container">
    <h2>Order Checkout</h2>
    <form action="process_order.php" method="POST">
        <div class="form-group">
            <label for="name">Full Name:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required>
        </div>
        <div class="form-group">
            <label for="phone">Phone:</label>
            <input type="text" id="phone" name="phone" required>
        </div>
        <button type="submit" class="checkout-btn">Place Order</button>
    </form>
</div>
<script src="app.js"></script>
<script>
    // Toggle button and dropdown menu JavaScript code here
</script>
</body>
</html>