<?php
    require_once 'config.php';

    // Check if a product is being added to the cart
    if (isset($_GET['add_to_cart']) && isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        
        // Check if the product is already in the cart
        $sql = "SELECT * FROM cart WHERE product_id = $productId";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            // If the product is already in the cart, update the quantity
            $row = $result->fetch_assoc();
            $quantity = $row['quantity'] + 1;
            $sql = "UPDATE cart SET quantity = $quantity WHERE product_id = $productId";
        } else {
            // If the product is not in the cart, insert a new row
            $sql = "INSERT INTO cart (product_id, quantity) VALUES ($productId, 1)";
        }
        
        // Execute the query
        $conn->query($sql);
        
        // Redirect back to the product page or update the cart view
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    $sql = "SELECT * FROM products";
    $all_products = $conn->query($sql);

     $sql = "SELECT SUM(quantity) AS total_quantity FROM cart";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $totalQuantity = $row['total_quantity'];
?>

<!DOCTYPE html>
<html lang="ru">
  <head>
   <meta charset="UTF-8">
   <link rel="stylesheet" href="style.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/56eb3b1966.js" crossorigin="anonymous"></script>
   <title>BestShoes</title>
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
                <li><a href="categories.php">CATEGORIES<i class="fa-solid fa-plus"></i></a></li>
            </ul>
                <div class="logo"><a href="index.html"><img src="icon.png" alt=""></a></div>
            <ul class="links1">
                <li><a href="about">ABOUT US</a></li>
                <li><a href="news">NEWS</a></li>
            </ul>
            <ul class="links2">
                <div class="shopping">
                <li><a href="cart.php"><i class="fa-solid fa-cart-shopping"> </i> <span class="quantity"><?php echo $totalQuantity; ?></span> </a></li>
            </div>
                <div class="my_acc"><li><a href="form/dashboard.php"><i class="fa-solid fa-user"></i></a></li></div>
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
        <div class="slid">
        <div class="slider">
    <div class="slides">
                        <!--radio buttons start-->
                            <input type="radio" name="radiobtn" id="radio1">
                            <input type="radio" name="radiobtn" id="radio2">
                            <input type="radio" name="radiobtn" id="radio3">
                            <input type="radio" name="radiobtn" id="radio4">
                        <!--radio buttons end-->
     <!--slide images start-->
    <div class="slide first">
        <img src="Sales.png" alt="">
    </div>
      <div class="slide ">
        <img src="Bf.png" alt="">
    </div>
    <div class="slide ">
        <img src="Sales1.png" alt="">
    </div>
    <div class="slide ">
        <img src="Bf1.png" alt="">
    </div>
     <!--slide images end-->
   
    </div>
        <!--manual navigation start-->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>
        </div>
            
         <!--manual navigation end-->
        </div>
        </div>
                
        
<div class = "containers">
                <div class = "product-items">
                    <?php
    while($row = mysqli_fetch_assoc($all_products)){
?>
                    <div class="product">
                <div class = "product-content">
                    <div class = "product-img"><img src="uploaded_img/<?php echo $row['image']; ?>" alt=""></div>
                    <div class="product-btns">
                        <a href="?add_to_cart=true&product_id=<?php echo $row['id']; ?>" class="btn-cart"> Add To Cart<span><i class="fas fa-plus"></i></span></a>
        <!-- Other buttons -->
                        <button type = "button" class = "btn-buy"> buy now
                            <span><i class = "fas fa-shopping-cart"></i></span>
                        </button>
                    </div>
                </div>
                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title"><?php echo $row ["type"];?></h2>
                            <div class = "rating">
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "far fa-star"></i></span>
                            </div>
                        </div>
                        <a href = "#" class = "product-name"><?php echo $row ["name"];?></a>
                        <p class = "product-price"><?php echo $row ["oldprice"];?></p>
                        <p class = "product-price"><?php echo $row ["price"];?></p>
                        <div class = "off-info">
                            <h2 class = "sm-title">25% off</h2>
                        </div>
                    </div>
                </div>
                            <?php
    }
?> 
        </div>
                </div>
      </div>
       <script src="app.js"></script>
      <script>
      const toggleBtn=document.querySelector(".toggle_btn")
      const toggleBtnIcon=document.querySelector(".toggle_btn i")
      const dropDownMenu=document.querySelector(".dropdown_menu")
      
      toggleBtn.onclick=function(){
          dropDownMenu.classList.toggle("open")
          const isOpen=dropDownMenu.classList.contains("open")
          
          toggleBtnIcon.classList = isOpen
            ?"fa-solid fa-xmark"
            :"fa-solid fa-bars"  
          
          
      }
      </script>>                
  </body>
</html>