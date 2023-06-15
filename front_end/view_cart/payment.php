<?php
session_start();

$count = 0;
if (isset($_SESSION['cart'])) {
    $count = count($_SESSION['cart']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thanh toán</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
    <div class="container mt-5">
        <main>
            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3 mt-5">
                        <span class="text-primary">Sản phẩm thanh toán</span>
                        <span class="badge bg-primary rounded-pill"><?php echo $count; ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php
                        $total = 0;
                        if (isset($_SESSION['cart'])) {
                            foreach ($_SESSION['cart'] as $key => $value) {

                                $total += ($value['price'] * $value['quantity']);
                                echo '                            
                                <li class="list-group-item d-flex justify-content-between lh-sm">
                                    <div>
                                        <h6 class="my-0">' . $value['product_name'] . '</h6>
                                        <small class="text-muted">Số lượng: ' . $value['quantity'] . '</small>
                                    </div>
                                    <span class="text-muted">' . ($value['price'] * $value['quantity']) . ' (vnđ)</span>
                                </li>';
                            }
                        } else {
                            echo '<li colspan="4"><h1 class="text-center" col=4>Không có sản phẩm nào!</h1></li>';
                        }

                        ?>
                        <li class="list-group-item d-flex justify-content-between">
                            <span>Tổng (VNĐ)</span>
                            <strong><?php echo $total; ?>(vnđ)</strong>
                        </li>
                    </ul>

                    <hr class="my-4">
                    <h4 class="mb-3"></h4> <!-- Phần chứa hình thức thanh toán -->
                    <!-- <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1">
                    </div> -->
                    <hr class="my-4">

                </div>
                <div class="col-md-7 col-lg-8">
                    <a href="my_cart.php">
                        <button class="btn btn-success btn-block col-lg-2">Giỏ hàng</button>
                    </a>
                    <h2 class="mb-3 text-center">Thông tin thanh toán</h2>
                    <form action="../../admin_cf/controllers/handle_cart.php" class="needs-validation was-validated" method="post">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label for="table_number" class="form-label">Bàn số</label>
                                <input type="number" class="form-control" id="table_number" name="table_number" min=1 required>
                                <div class="invalid-feedback">
                                    Nhập tên bàn của bạn.
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="form-label">NOTE</label>
                                <input disabled class="form-control" placeholder="Bạn hãy thanh toán trước để xác nhận bill nhé">
                            </div>

                            <div class="col-6">
                                <label for="customer_phone" class="form-label">Số điện thoại <span class="text-muted">(Trong thời gian order, chúng tôi có thể liên lạc với bạn trong trường hợp đặc biệt)</span></label>
                                <input type="number" class="form-control" id="customer_phone" name="customer_phone" required="">
                                <div class="invalid-feedback">
                                    Hãy nhập số điện thoại của bạn.
                                </div>
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="col-12">
                            <label for="note" class="form-label">Ghi chú <span class="text-muted">(Tùy chọn)</span></label>
                            <textarea type="number" class="form-control" rows="6" id="note" name="note"></textarea>
                        </div>

                        <hr class="my-4">

                        <div class="col-12">
                            <button class="w-100 btn btn-primary btn-lg" type="submit" name="submit_payment">Tiến hành thanh toán</button>
                        </div>
                        <br><br>
                    </form>
                </div>
            </div>
        </main>
    </div>

</body>

</html>