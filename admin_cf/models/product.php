<?php

class Product
{
    public $product_id;
    public $product_name;
    public $category_id;
    public $product_img;
    public $product_desc;
    public $product_price;

    // show list product by category
    public static function showProductList($category)
    {
        $result = DB::connect()->query("SELECT * FROM product;");

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['category_id'] == $category) {
                    $product_id = $row['product_id'];
                    $product_name = $row['product_name'];
                    $image = $row['product_img'];
                    $description = $row['product_desc'];
                    $price = $row['product_price'];
                    $category_id = $row['category_id'];

                    echo '
                        <div class="col-lg-3">
                            <form action="../../admin_cf/controllers/handle_cart.php" method="post" class="mt-3 mb-3">
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
        }
    }

    // get all products function
    public function getAllProducts()
    {
        $sql = "SELECT * FROM `product`";
        $result = DB::connect()->query($sql);
        $products = [];

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $product = array(
                    'product_id' => $row['product_id'],
                    'product_name' => $row['product_name'],
                    'category_id' => $row['category_id'],
                    'product_img' => $row['product_img'],
                    'product_desc' => $row['product_desc'],
                    'product_price' => $row['product_price']
                );
                $products[] = $product;
            }
        }
        return $products;
    }

    // add product function
    public function addProduct($product_id, $product_name, $category_id, $product_img, $product_desc, $product_price)
    {
        // get data
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->category_id = $category_id;
        $this->product_img = $product_img;
        $this->product_desc = $product_desc;
        $this->product_price = $product_price;

        // insert data into database
        $sql = "INSERT INTO `product`(`product_id`, `product_name`, `category_id`, `product_img`, `product_desc`, `product_price`) 
                VALUES ('$this->product_id','$this->product_name','$this->category_id','$this->product_img','$this->product_desc','$this->product_price')";
        if (DB::connect()->query($sql) === TRUE) {
            if ($category_id == 1) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
            } elseif ($category_id == 2) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
            }
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }

    // update product function
    public function updateProduct($product_id, $product_name, $category_id, $product_img, $product_desc, $product_price)
    {
        // get data
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->category_id = $category_id;
        $this->product_img = $product_img;
        $this->product_desc = $product_desc;
        $this->product_price = $product_price;

        // update data in database
        $sql = "UPDATE `product` SET `product_id`='$this->product_id',`product_name`='$this->product_name',`category_id`='$this->category_id',`product_img`='$this->product_img',`product_desc`='$this->product_desc',`product_price`='$this->product_price' WHERE `product_id`='$this->product_id'";
        if (DB::connect()->query($sql) === TRUE) {
            if ($category_id == 1) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
            } elseif ($category_id == 2) {
                header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
            }
        } else {
            echo "Error {$sql}" . DB::connect()->error;
        }
    }

    // delete product function
    public function deleteProduct($product_id)
    {
        // get data
        $this->product_id = $product_id;

        // Get category_id of the product
        $sql = "SELECT `category_id` FROM `product` WHERE `product_id`='$this->product_id'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $category_id = $row['category_id'];

            // delete data from database by id
            $sql = "DELETE FROM `product` WHERE `product_id`='$this->product_id'";
            if (DB::connect()->query($sql) === TRUE) {
                if ($category_id == 1) {
                    header('Location:http://localhost/coffee_shop/admin_cf/?table=coffee');
                } elseif ($category_id == 2) {
                    header('Location:http://localhost/coffee_shop/admin_cf/?table=cake');
                }
            } else {
                echo "Error {$sql}" . DB::connect()->error;
            }
        }
    }

    // id check function
    public function compareID($product_id)
    {
        $sql = "SELECT * FROM `product` WHERE `product_id`='$product_id'";
        $result = DB::connect()->query($sql);

        if ($result->num_rows > 0) {
            echo '<script>alert("ID sản phẩm đã tồn tại!");</script>';
            echo '<script>window.location.href = "http://localhost/coffee_shop/admin_cf/views/view_form/form_add_product.php";</script>';
            die();
        } 
    }
}
