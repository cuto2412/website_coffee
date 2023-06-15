<?php

class Cart
{
    // add product into cart
    public static function addToCart($productName, $price, $categoryID)
    {
        if (isset($_SESSION['cart'])) {
            // retrieves a subarrray containing the values of the product_name column from a $_SESSION['cart'] two-dimensional array
            $myItems = array_column($_SESSION['cart'], 'product_name');

            if (in_array($productName, $myItems)) {
                // search the index of the product in the cart
                $productIndex = array_search($productName, $myItems);
                // increase the quantity of the product by 1
                $_SESSION['cart'][$productIndex]['quantity'] += 1;
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('product_name' => $productName, 'price' => $price, 'quantity' => 1);
            }
        } else {
            $_SESSION['cart'][0] = array('product_name' => $productName, 'price' => $price, 'quantity' => 1);
        }

        if ($categoryID == 1) {
            header('Location:http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=coffee_list');
        } elseif ($categoryID == 2) {
            header('Location:http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=cake_list');
        }
    }

    public static function removeFromCart($productName)
    {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['product_name'] == $productName) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                header('Location:http://localhost/coffee_shop/front_end/view_cart/my_cart.php');
            }
        }
    }

    public static function makePayment($tableNumber, $note, $customerPhone)
    {
        $total = 0;
        $products = '';

        foreach ($_SESSION['cart'] as $key => $value) {
            $total += ($value['price']*$value['quantity']);
            $products .= $value['product_name'] . '(' . $value['quantity'] . '),';
        }

        $productsOrdered = rtrim($products, ', ');
        $orderTime = date("Y-m-d H:i:s");
        $totalPayment = $total;

        $sql = "INSERT INTO `order_customer`(`table_number`, `products_ordered`, `order_time`, `note`, `customer_phone`,`total_payment`) 
                VALUES ('$tableNumber','$productsOrdered','$orderTime','$note','$customerPhone','$totalPayment')";

        $conn = DB::connect();

        if ($conn->query($sql)) {
            $order_id = $conn->insert_id;
            
            echo '<script>alert("Order thành công!");</script>';          
            echo '<script>window.location.href = "http://localhost/coffee_shop/front_end/view_cart/invoice.php?order_id=' . $order_id . '";</script>';
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }
}
