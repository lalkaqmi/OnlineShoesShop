<?php
    require_once 'config.php';

    $sql="SELECT * FROM products";
    $all_products = $conn->query($sql);
?>
let openShopping = document.querySelector('.shopping');
let closeShopping = document.querySelector('.closeShopping');
let list =document.querySelector(".product-items");
let listCard = document.querySelector('.product');
let body = document.querySelector('body');
let total = document.querySelector('.total');
let quantity = document.querySelector('.quantity');
openShopping.addEventListener('click', ()=>{
    body.classList.add('active');
})
closeShopping.addEventListener('click', ()=>{
    body.classList.remove('active');
})
<div class = "containers">
                <div class = "product-items">
                    <?php
    while($row = mysqli_fetch_assoc($all_products)){
?>
let products = [
    
     {
        id: 1,
        type:<?php echo $row ["type"];?>,
        name: <?php echo $row ["name"];?>,
        image:<?php echo $row['image']; ?>,
        oldPrice:<?php echo $row ["oldprice"];?>,
        price: <?php echo $row ["price"];?>
    },
        {
        id: 2,
        type:"LifeStyle",
        name: 'PRODUCT NAME 1',
        image: '2.PNG',
        oldPrice:150000,
        price: 120000
    },
      {
        id: 4,
        type:"LifeStyle",
        name: 'PRODUCT NAME 1',
        image: '4.PNG',
        oldPrice:170000,
        price: 150000
    },
      {
        id: 3,
        type:"LifeStyle",
        name: 'PRODUCT NAME 1',
        image: '3.PNG',
        oldPrice:250000,
        price: 210000
    },
];
let listCards  = [];
function initApp(){
    products.forEach((value, key) =>{
        let newDiv = document.createElement('div');
        newDiv.classList.add('product');
        newDiv.innerHTML = `
                <div class="product">
                <div class = "product-content">
                    <div class = "product-img"><img src="image/${value.image}"></div>
                    <div class = "product-btns">
                        <button onclick="addToCard(${key})" class = "btn-cart">Add To Card
                            <span><i class = "fas fa-plus"></i></span>
                        </button>
                        <button type = "button" class = "btn-buy"> buy now
                            <span><i class = "fas fa-shopping-cart"></i></span>
                        </button>
                    </div>
                </div>
                <div class = "product-info">
                    <div class = "product-info-top">
                        <h2 class = "sm-title">${value.type}</h2>
                            <div class = "rating">
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "fas fa-star"></i></span>
                                <span><i class = "far fa-star"></i></span>
                            </div>
                        </div>
                        <a href = "#" class = "product-name">${value.name}</a>
                        <p class = "product-price">${value.oldPrice.toLocaleString()}</p>
                        <p class = "product-price">${value.price.toLocaleString()}</p>
                        <div class = "off-info">
                            <h2 class = "sm-title">25% off</h2>
                        </div>
                    </div>
                </div>
        </div>`;
        list.appendChild(newDiv);
    })
}
initApp();
function addToCard(key){
    if(listCards[key] == null){
        // copy product form list to list card
        listCards[key] = JSON.parse(JSON.stringify(products[key]));
        listCards[key].quantity = 1;
    }
    reloadCard();
}
function reloadCard(){
    listCard.innerHTML = '';
    let count = 0;
    let totalPrice = 0;
    listCards.forEach((value, key)=>{
        totalPrice = totalPrice + value.price;
        count = count + value.quantity;
        if(value != null){
            let newDiv = document.createElement('li');
            newDiv.innerHTML = `
            <div class = "product-content-buy">
                <div class = "product-img-buy"><img src="image/${value.image}"></div>
                <div>${value.name}</div>
                <div>${value.price.toLocaleString()}</div>
                <div class="bbtns">
                    <button onclick="changeQuantity(${key}, ${value.quantity - 1})">-</button>
                    <div class="count">${value.quantity}</div>
                    <button onclick="changeQuantity(${key}, ${value.quantity + 1})">+</button>
                </div>
            </div>`;
                listCard.appendChild(newDiv);
        }
    })
    total.innerText = totalPrice.toLocaleString();
    quantity.innerText = count;
}
function changeQuantity(key, quantity){
    if(quantity == 0){
        delete listCards[key];
    }else{
        listCards[key].quantity = quantity;
        listCards[key].price = quantity * products[key].price;
    }
    reloadCard();
}