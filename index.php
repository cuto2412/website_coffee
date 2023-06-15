<?php
session_start();
if (!isset($_SESSION['admin_name'])) {
    $isLogin=false;
}
else{
  $isLogin=true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./Nike.css">
    <link rel="stylesheet"  href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
  </head>
<body>
    
      <?php 
        // session_start();
        // require 'constant.php';

        $mysql = new mysqli("localhost","root","","db_coffee");

        // Check connection
        if ($mysql->connect_error) {
          echo "Không thể kết nối Mysql" . $mysqli->connect_error;
          exit();
        }
        // include('admin_cf/models/user.php');
        include("front_end/component/nav.php");
        include("front_end/component/main.php");
        include("front_end/component/footer.php");
      ?>
    
      
    <script src="/Shop/nike.js"></script>
</body>
</html>