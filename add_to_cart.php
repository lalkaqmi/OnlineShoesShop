<?php
// add_to_cart.php

require_once 'config.php';

if(isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    $quantity = 1; // Пример количества, можно настраивать
    
    // Здесь выполняйте код для добавления товара в таблицу корзины в базе данных
    // Используйте переменные $product_id и $quantity для вставки данных в таблицу
}
?>
