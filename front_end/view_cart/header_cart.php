<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <img class="navbar-toggler-icon" href='./../../index.php'></img>
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <form style="margin-left: 578px;" action="menu_product.php" method="get" class="mt-4">
                        <button name="list" value="coffee_list" style="min-width: 150px; margin: 0 10px" type="submit" class="btn btn-warning   ">Coffee</button>
                        <button name="list" value="cake_list" style="min-width: 150px; margin: 0 10px" type="submit" class="btn btn-warning ">Cake</button>
                    </form>
                </li>
            </ul>
            <div>
                <?php
                $total_quantity = 0;
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $total_quantity += $item['quantity'];
                    }
                }

                ?>
                <a href="my_cart.php" class="btn btn-outline-success">My Cart (<?php echo $total_quantity; ?>)</a>
            </div>
        </div>
    </div>
</nav>