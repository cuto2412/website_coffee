<div class="wrapper-order">
    <div class="heading-order">
        <h1 style="color: var(--color-begie);"><i class="fa-solid fa-file-invoice"></i>&nbsp; Being Ordered</h1>
    </div>
    <div class="body-order">
        <table border="1" cellspacing="0" cellpadding="10">
            <tr>
                <th style="width:2%">Bàn</th>
                <th style="width:15%">Sẩn phẩm</th>
                <th style="width:5%">Thời điểm order</th>
                <th style="width:15%">Ghi chú</th>
                <th style="width:5%">Số điện thoại</th>
                <th style="width:8%">Tổng thanh toán (VNĐ)</th>
                <th style="width:5%">Trạng thái</th>
            </tr>
            <?php
            $result = DB::connect()->query("SELECT * FROM order_customer;");

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    $table_number = $row['table_number'];
                    $products_ordered = $row['products_ordered'];
                    $order_time = $row['order_time'];
                    $note = $row['note'];
                    $customer_phone = $row['customer_phone'];
                    $total_payment = $row['total_payment'];

                    echo '
                    <tr>
                        <td>' . $table_number . '</td>
                        <td style="text-align: left">' . $products_ordered . '</td>
                        <td>' . $order_time . '</td>
                        <td style="text-align: left">' . $note . '</td>
                        <td>' . $customer_phone . '</td>
                        <td>' . $total_payment . '</td>
                        <form action="' . dir_front . '/front_end/view_cart/invoice.php' . '" method="post">
                            <td><input onclick="changeButton(this)" class="btn-confirm" name="btn-confirm" type="submit" value="Xác nhận"></td>
                        </form>
                    </tr>';
                }
            }

            ?>

        </table>
    </div>

</div>
<script>
    function changeButton(button) {
        button.className = "btn-done";
        button.value = "Hoàn thành";
        button.disabled = true; // vô hiệu hóa button
        // event.preventDefault(); // Ngăn chặn hành động mặc định của form
    }
</script>