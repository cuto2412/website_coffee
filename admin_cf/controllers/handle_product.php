<?php

// add product
if (isset($_POST['add_product'])) {// initialize object
    $product = new Product();

    // receive data from form add
    $product_id = $_POST['product_id'];
    $product->compareID($product_id);
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    // Move uploaded file to a specific folder
    $image_path = basename($_FILES['product_img']['name']);
    $target_dir = 'assets/image/product_img/';
    $target_file = $target_dir . $image_path; 
    move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);

    $product->addProduct($product_id, $product_name, $category_id, $target_file, $product_desc, $product_price);
}

// update product
if (isset($_POST['update_product'])) {
    // initialize object
    $product = new Product();

    // receive data from form update
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $product_desc = $_POST['product_desc'];
    $product_price = $_POST['product_price'];

    // Move uploaded file to a specific directory
    $image_path = basename($_FILES['product_img']['name']);
    $target_dir = 'assets/image/product_img/';
    $target_file = $target_dir . $image_path; 
    move_uploaded_file($_FILES['product_img']['tmp_name'], $target_file);

    $product->updateProduct($product_id, $product_name, $category_id, $target_file, $product_desc, $product_price);
}

// delete product
if (isset($_GET['deleteid'])) {
    // initialize object
    $product = new Product();

    // get data from table product
    $product_id = $_GET['deleteid'];

    $product->deleteProduct($product_id);
}
