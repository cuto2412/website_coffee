<?php
    require 'constant.php';

    require dir_admin . '/config/database.php';
    require dir_admin . '/models/product.php';
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$result = DB::connect()->query("SELECT * FROM product WHERE product.product_name LIKE '%".$tukhoa."%';");
	

    
    // $result = DB::connect()->query("SELECT * FROM product;");
    ?>
    <main>
        <div class="container" style="margin-top:7rem!important;">
            <div class="main_sanpham">
            
                <div class="main_sanpham_right">

                <div class="mid_menu">
                    <p class="mid_menu_name">Kết quả tìm kiếm: <tr> <?php echo $_POST['tukhoa']; ?></p>
                </div>
                <div class="row">
                    
                    <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {

                                $product_id = $row['product_id'];
                                $product_name = $row['product_name'];
                                $image = $row['product_img'];
                                $description = $row['product_desc'];
                                $price = $row['product_price'];
                                $category_id = $row['category_id'];

                                echo '
                                <div class="col-lg-3">
                                    <form action="http://localhost/coffee_shop/admin_cf/controllers/handle_cart.php" method="post" class="mt-5 mb-3">
                                        <div class="card">
                                            <img src="' . dir_admin_url . '/' . $image . '" class="card-img-top" alt="" style="height: 250px;">
                                            <div class="card-body text-center">
                                                <h5 class="card-title">' . $product_name . '</h5>
                                                <p class="card-text">' . $price . ' (VNĐ)</p>
                                                <button type="submit" name="add_to_cart" class="btn btn-info">Thêm vào giỏ hàng</button>
                                                <input type="hidden" name="product_name" value="' . $product_name . '">
                                                <input type="hidden" name="product_price" value="' . $price . '">
                                                <input type="hidden" name="category_id" value="' . $category_id . '">
                                            </div>
                                        </div>
                                    </form>
                                </div>';
                            }
                        }
                    ?>
                </div>
                </div>
            </div>   
            </div>     
    </main>
