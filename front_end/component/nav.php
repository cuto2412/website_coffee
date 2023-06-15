

<!-- session_start();
require '../../constant.php';

require dir_admin . '/config/database.php';
require dir_admin . '/models/product.php'; -->

<!--page home  -->
<header class>
        <a href="index.php" class=" logo">
          <img src="admin_cf/assets/image/others/logo.jpg" alt="">
        </a>
        <!-- menu icon -->
        <!-- <i class='bx bx-menu'></i> -->
        <!-- Link -->
        <ul class="navbar">
          <li><a href="#Home">Home</a></li>
          <li><a href="#Contact">Contact</a></li>
          <li><a href="http://localhost/coffee_shop/front_end/view_cart/menu_product.php">Product</a></li>
          
                   
          <li> <a href="#Abouts">About</a></li>
          
          <form style="" action="http://localhost/coffee_shop/front_end/view_cart/menu_product.php" method="get" class="">
                        <button name="list" value="coffee_list" style="" type="submit" class="btn">Coffee</button>
                        <button name="list" value="cake_list" style="" type="submit" class="btn ">Cake</button>
          </form>
          
        </ul>
        <!-- Icon -->
        
        <form action="index.php?ql=timkiem" class="search-form" method="post" autocomplete="off">
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
         
            <?php

              if (!$isLogin) {
                
                  echo '<a href="http://localhost/coffee_shop/admin_cf/views/view_account/login.php"><i class="bx bx-user" id="login-icon"></i></a>';
              }
              else {
                echo $_SESSION['admin_name'];
                echo '<div class="btn-logout mr-3">
                      <a href="http://localhost/coffee_shop/admin_cf/views/view_account/logout.php"><i class="bx bx-log-in"></i></a>
                      </div>';
              }
            ?>
        </div>
</header>
