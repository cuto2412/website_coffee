<?php
    require 'constant.php';

    require dir_admin . '/config/database.php';
    require dir_admin . '/models/product.php';
	$sql_details = "SELECT * FROM product WHERE product.product_id='$_GET[pro_id]' LIMIT 1";
	$result = mysqli_query($mysql,$sql_details);
	
?>
<div class="main_sanpham">
                
    <div class="main_sanpham_right">

        <div class="mid_chitietsp">
            <p class="chitietsp">CHI TIẾT SẢN PHẨM</p>

        </div>
        <?php 
                    
            while($row_chitiet = mysqli_fetch_array($result)){
                    $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $image = $row['product_img'];
                        $description = $row['product_desc'];
                        $price = $row['product_price'];
                        $category_id = $row['category_id'];
        ?>
                 
        <div class="main_chitiet_right_table">
                     
            <div class="main_chitiet_right_table-img">
                <div class="main_chitiet_right_table-big">
                <img src="' . dir_admin_url . '/'<?php  echo . $image . ?>'" class="card-img-top" alt="" style="height: 250px;">
                </div>
                       
            </div>
         
                        <!-- <span style="font-size:18px;">Số lượng : </span> -->
                        <!-- <input style="margin-bottom:30px;height: 30px;width:80px;" class="soluong input_soluong" name="soluong" id="soluong<?php echo $row_chitiet['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row_chitiet['soluong'];?>" > -->
    </div>
                
    <?php }?>
                    
</div>
            

<!-- <div class="col-lg-3">
    <form action="../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3"> -->