<?php
session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/models/cart.php';

if (isset($_POST['add_to_cart'])) {
    $productName = $_POST['product_name'];
    $price = $_POST['product_price'];
    $categoryID = $_POST['category_id'];

    Cart::addToCart($productName, $price, $categoryID);
}

if (isset($_POST['remove_item'])) {
    $productName = $_POST['product_name'];
    Cart::removeFromCart($productName);
}

if (isset($_POST['submit_payment'])) {
    $tableNumber = $_POST['table_number'];
    $note = $_POST['note'];
    $customerPhone = $_POST['customer_phone'];

    Cart::makePayment($tableNumber, $note, $customerPhone);
    session_unset();
    session_destroy();
}

