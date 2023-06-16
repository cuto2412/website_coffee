<?php
    require 'constant.php';

    require dir_admin . '/config/database.php';
    require dir_admin . '/models/product.php';
    require dir_admin . '/models/cart.php';
	$sql_details = "SELECT * FROM product WHERE product.product_id='$_GET[pro_id]' LIMIT 1";
	$result = mysqli_query($mysql,$sql_details);
	
?>
<div class="main_sanpham">
                
    <div class="main_sanpham_right">

        <div class="mid_chitietsp">
            <p class="chitietsp">CHI TIẾT SẢN PHẨM</p>

        </div>
        <?php 
                    
            while($row = mysqli_fetch_array($result)){
                        $product_id = $row['product_id'];
                        $product_name = $row['product_name'];
                        $image = $row['product_img'];
                        $description = $row['product_desc'];
                        $price = $row['product_price'];
                        $category_id = $row['category_id'];
        ?>
                 
        <div class="main_chitiet_right_table" style="display: flex;">
                     
            <div class="">
                <div class="main_chitiet_right_table-big">
                    <img src="http://localhost/coffee_shop/admin_cf/<?php  echo $image;?>" class="card-img-top" alt="" style="height: 250px;width: auto;">
                </div> 
            </div>
            <form action="../../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3">
                <div class="chitiet_right">
                    <p>Tên sản phẩm</p>
                    <div class="main_sanpham_sp_name" style="width:100%;">
                            <h2><?php echo $product_name ?></h2>
                    </div>
                    <p style="color:#EA8025;"><?php echo number_format($price) ?> <sup style="color:red">đ</sup></p>
                    <p>Mô tả: <?php echo $description ?></p>
                    <button type="submit" name="add_to_cart" class="btn btn-info">Thêm vào giỏ hàng</button>
                </div>
            </form>
                        <!-- <span style="font-size:18px;">Số lượng : </span> -->
                        <!-- <input style="margin-bottom:30px;height: 30px;width:80px;" class="soluong input_soluong" name="soluong" id="soluong<?php echo $row_chitiet['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row_chitiet['soluong'];?>" > -->
        </div>
    </div>
                
    <?php }?>
                    
</div>
<style>
    .chitiet_right{
    margin-left: 60px;
}
    .chitiet_right p{
    font-size: 18px;
    color: black;
    margin-bottom: 15px;
}
</style>
            

<!-- <div class="col-lg-3">
    <form action="../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3"> -->