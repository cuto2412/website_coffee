<?php
require '../../constant.php';
require dir_admin . '/config/database.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hóa đơn</title>
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <a href="http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=coffee_list"><input type="submit" value="Tiếp Tục Order"></a>
    <h1>Giao diện trang hóa đơn.</h1>
    <input type="submit" disabled>
    <?php
    if (isset($_GET['order_id'])) {
        $order_id = $_GET['order_id'];

        $sql = "SELECT order_id, table_number, products_ordered, order_time, note, customer_phone, total_payment
        FROM order_customer
        WHERE order_id = '$order_id'";

        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $order_id = $row['order_id'];
                $tableNumber = $row['table_number'];
                $productsOrdered = $row['products_ordered'];
                $orderTime = $row['order_time'];
                $note = $row['note'];
                $customerPhone = $row['customer_phone'];
                $totalPayment = $row['total_payment'];

                // In ra thông tin
                echo 'Order ID: ' . $order_id . '<br>';
                echo 'Table Number: ' . $tableNumber . '<br>';
                echo 'Products Ordered: ' . $productsOrdered . '<br>';
                echo 'Order Time: ' . $orderTime . '<br>';
                echo 'Note: ' . $note . '<br>';
                echo 'Customer Phone: ' . $customerPhone . '<br>';
                echo 'Total Payment: ' . $totalPayment . '<br>';
            }
        }
    }
    var_dump(isset($_POST['btn-confirm']));
    ?>
    
    <form action="" method="post">
        <input onclick="return confirm('Bạn thật sự muốn hủy đơn?')" type="submit" value="HỦY ĐƠN" id="btn-cancel" name="btn-cancel" <?php if (isset($_POST['btn-confirm'])) echo 'disabled'; ?>>
    </form>




    <?php
    if (isset($_POST['btn-cancel'])) {
        $order_id = $_GET['order_id'];

        $sql = "DELETE FROM order_customer WHERE order_id = $order_id";

        $result = DB::connect()->query($sql);

        if ($result == true) {
            echo '<script>window.location.href = "http://localhost/coffee_shop/front_end/view_cart/menu_product.php";</script>';
        }
    }
    ?>
</body>

</html>