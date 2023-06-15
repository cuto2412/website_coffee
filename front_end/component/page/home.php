<section class="home" id="Home">
        <div class="home-text">
          <h1>
            Start your day with coffee. 

          </h1>
          <p>
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum autem ut quos provident. Quod sit, eos porro beatae quidem repellendus esse optio dignissimos voluptatem molestiae eius quae quaerat quo iusto?
          </p>
          <a href="" class="btn">Shop Now</a>
          
        </div>
        <div class="home-img">
          <img src="./img/main.png" alt="">
        </div>
      </section>
    <!-- link js -->  
      <section class="about" id="Abouts">
        <div class="about-id">
          <img src="./img/about.jpg" alt="">
        </div>
        <div class="about-text">
          <h2> History</h2>

          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti reprehenderit, minus praesentium in, deleniti est a consectetur vel aspernatur eligendi magnam quis unde doloremque inventore aliquid voluptatibus. Eveniet, possimus at!
        
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti reprehenderit, minus praesentium in, deleniti est a consectetur vel aspernatur eligendi magnam quis unde doloremque inventore aliquid voluptatibus. Eveniet, possimus at!
        
          </p><p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Corrupti reprehenderit, minus praesentium in, deleniti est a consectetur vel aspernatur eligendi magnam quis unde doloremque inventore aliquid voluptatibus. Eveniet, possimus at!
        
          </p>
            <a href="#" class="btn">Lear More</a>
        </div>
      </section>
      <!-- Products -->
      <?php
          
          require 'constant.php';

          require dir_admin . '/config/database.php';
          require dir_admin . '/models/product.php';
      ?>
      <!-- Product -->
      <main>
        <div class='products'>
          <center>
            <a href='http://localhost/coffee_shop/front_end/view_cart/menu_product.php?list=cake_list' class="btn btn-info" >Xem tất cả sản phẩm
            </a>
          </center>
        </div>
        <div class="container mt-5">
            <div class="row">
                <?php
                if (isset($_GET['list'])) {
                    switch ($_GET['list']) {
                        case "coffee_list":
                            Product::showProductList(1);
                            die();
                        case "cake_list":
                            Product::showProductList(2);
                            die();
                    }
                }
                $result = DB::connect()->query("SELECT * FROM product;");

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
                            <form action="http://localhost/coffee_shop/admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3">
                                <div class="card">
                                    <img src="' . dir_admin_url . '/' . $image . '" class="card-img-top" alt="" style="height: 250px;">
                                    <div class="card-body text-center">
                                        <a href="http://localhost/coffee_shop/index.php?ql=chitiet&pro_id='.$product_id.'"><h5 class="card-title">' . $product_name . '</h5></a>
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
      </main>