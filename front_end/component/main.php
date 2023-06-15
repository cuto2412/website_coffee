<?php
    if(isset($_GET['ql']))
        $tam = $_GET['ql'];
    else    $tam = '';

    if($tam == 'timkiem')
        include("page/search.php");
    elseif($tam == 'chitiet')
        include("page/details_product.php");
    else{
        include("page/home.php");
    }
?>