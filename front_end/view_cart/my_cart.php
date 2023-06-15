<?php
session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/models/product.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giỏ Hàng</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <header>
        <?php include 'header_cart.php'; ?>
    </header>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center border rounded bg-light my-5">
                    <h1 class="mt-2">GIỎ HÀNG</h1>
                </div>

                <div class="col-lg-9">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th scope="col">Serial No.</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Giá (VNĐ)</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng cộng (VNĐ)</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php
                            // $total = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $sr = $key + 1;
                                    // $total += ($value['price'] * $value['quantity']);
                                    echo '
                                <tr>
                                    <td>' . $sr . '</td>
                                    <td>' . $value['product_name'] . '</td>
                                    <td>' . $value['price'] . '<input type="hidden" class="iprice" value="' . $value['price'] . '"></td>
                                    <td><input style="width:80px" class="text-center iquantity" onchange="subTotal()" type="number" min="1" value="' . $value['quantity'] . '"></td>
                                    <td class="itotal"></td>
                                    <td>
                                    <form action="../../admin_cf/controllers/handle_cart.php" method="POST">
                                        <button onclick="return confirm(\'Bạn muốn xóa ' . $value['product_name'] . '?\');" type="submit" name="remove_item" class="btn btn-sm btn-outline-danger">XÓA</button>
                                        <input type="hidden" name="product_name" value="' . $value['product_name'] . '">
                                    </form>
                                    </td>
                                </tr>
                                ';
                                }
                            } else {
                                echo '<td colspan="4"><h1 class="text-center" col=4>Không có sản phẩm nào!</h1></td>';
                            }
                            ?>
                        </tbody>
                    </table>
                </div>

                <div class="col-lg-3">
                    <div class="border bg-light rounded p-4">
                        <h4>Tổng số tiền:</h4>
                        <h5 class="text-center" id="gtotal"></h5>
                        <br>
                        <a href="payment.php">
                            <button type="submit" class="btn btn-primary btn-block col-lg-12">Thanh toán</button>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </main>
    <script>
        var gt=0;
        var iprice = document.getElementsByClassName('iprice');
        var iquantity =  document.getElementsByClassName('iquantity');
        var itotal =  document.getElementsByClassName('itotal');
        var gtotal=document.getElementById('gtotal');

        function subTotal() {
            gt = 0;
            for(i=0; i<iprice.length;i++) {
                itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
                gt += ((iprice[i].value)*(iquantity[i].value));
            }
            gtotal.innerText=gt;
        }
        subTotal();
    </script>
</body>

</html>