<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM product WHERE product.product_name LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysql,$sql_pro);
	
?>
