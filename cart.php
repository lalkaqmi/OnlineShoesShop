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
<div class="cart_container">
    <?php
    require_once 'config.php';

    if (isset($_GET['remove_from_cart']) && isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];

        // Remove the product from the cart
        $sql = "DELETE FROM cart WHERE product_id = $productId";
        $conn->query($sql);
        
    }
    if (isset($_GET['change_quantity']) && isset($_GET['quantity'])) {
        $productId = $_GET['change_quantity'];
        $quantity = $_GET['quantity'];

        // Update the quantity of the product in the cart
        $sql = "UPDATE cart SET quantity = $quantity WHERE product_id = $productId";
        $conn->query($sql);
    }

    $sql = "SELECT c.product_id, p.name, p.price ,p.image,p.type, c.quantity FROM cart c JOIN products p ON c.product_id = p.id";
    $result = $conn->query($sql);

    $totalAmount = 0; // Initialize total amount variable

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $productName = $row['name'];
            $productType = $row['type'];
            $productPrice = $row['price'];
            $productImage = $row['image'];
            $productQuantity = $row['quantity'];

            // Add product price multiplied by quantity to the total amount
            $totalAmount += ($productPrice * $productQuantity);

            ?>
            <div class="cart-item">
                <div class="product-image">
                    <img src="uploaded_img/<?php echo $productImage; ?>">
                </div>
                <div class="product-details">
                    <div class="product-name"><?php echo $productName; ?></div>
                    <div class="product-type"><?php echo $productType; ?></div>
                </div>
                <div class="product-price">$<?php echo $productPrice; ?></div>
                <div class="product-actions">
                    <div class="quantity-selector">
                        <a href="?change_quantity=<?php echo $productId; ?>&quantity=<?php echo $productQuantity - 1; ?>" class="change-quantity decrease">
                            <i class="fas fa-minus"></i>
                        </a>
                        <span class="quantity"><?php echo $productQuantity; ?></span>
                        <a href="?change_quantity=<?php echo $productId; ?>&quantity=<?php echo $productQuantity + 1; ?>" class="change-quantity increase">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>
                </div>
                <a href="?remove_from_cart=true&product_id=<?php echo $productId; ?>" class="remove-btn">
                    <i class="fas fa-trash"></i>
                </a>
            </div>
            <?php
        }

        // Display the total amount
        ?>
        <div class="total-amount">Total: $<?php echo $totalAmount; ?></div>
        <a href="checkout.php" class="checkout-btn">Checkout</a>
        <?php
    } else {
        echo "<p>Your cart is empty.</p>";
    }
    ?>
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
    </div>
<script src="app.js"></script>
<script>
    const toggleBtn = document.querySelector(".toggle_btn");
    const toggleBtnIcon = document.querySelector(".toggle_btn i");
    const dropDownMenu = document.querySelector(".dropdown_menu");

    toggleBtn.onclick = function () {
        dropDownMenu.classList.toggle("open");
        const isOpen = dropDownMenu.classList.contains("open");

        toggleBtnIcon.classList = isOpen ? "fa-solid fa-xmark" : "fa-solid fa-bars";
    };
</script>
</body>
</html>
