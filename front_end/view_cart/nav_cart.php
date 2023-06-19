

<!-- session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/models/product.php'; -->

<!--page home  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./../../Nike.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  </head>
<body>
    <header>
        <a href="../../index.php" class="logo">
          <img src="../../img/logo.jpg" alt="">
        </a>
        <!-- menu icon -->
        <!-- Link -->
        <ul class="navbar">
          <li><a href="http://localhost/coffee_shop/index.php">Home</a></li>
          
                
          <form style="" action="http://localhost/coffee_shop/front_end/view_cart/menu_product.php" method="get" class="">
                        <button name="list" value="coffee_list" style="" type="submit" class="btn">Coffee List</button>
                        <button name="list" value="cake_list" style="" type="submit" class="btn ">Cake List</button>
          </form>
          
        </ul>
        <!-- Icon -->
        
        <form action="http://localhost/coffee_shop/index.php?ql=timkiem" class="search-form" method="post" autocomplete="off">
                <input name="tukhoa"  type="search" id="search-box" placeholder="Bạn muốn tìm gì...">
                <button name="timkiem" type="submit"><label for="search-box" class="bx bx-search"></label></button>
            </form>
        <!-- seacrh box -->
        

        <!-- view cart -->
        <div>
                <?php
                $total_quantity = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $total_quantity += $item['quantity'];
                    }
                }

                ?>
                <a href="http://localhost/coffee_shop/front_end/view_cart/my_cart.php" class="btn btn-outline-success">My Cart (<?php echo $total_quantity; ?>)</a>
            </div>
            <div class="header-icon">
         
          
          <a href="../../index.php"><i class='bx bx-home' id=""></i><a>
        </div>
    </header>
</body>
</html>