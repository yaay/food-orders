<?php


include './db_connection.php';
include './connection_credentials.php';

$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet"  href="css_bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/admin_style.css">
    <title>show admin products</title>
</head>
<body>
    

<section class="show-products">

   <h1 class="heading">products added</h1>

   <div class="box-container">

   <?php
      $select_products = $db->prepare("SELECT * FROM `restaurant`.`products`");
      $select_products->execute();
      if($select_products->rowCount() > 0){
         while($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)){ 
   ?>
   <div class="box">
      <div class="price"><span><?= $fetch_products['price']; ?></span>$</div>
      <img src="uploaded_img/<?= $fetch_products['image']; ?>" alt="">
      <div class="name"><?= $fetch_products['name']; ?></div>
      <div class="flex-btn">
         <a href="admin_product_update.php?update=<?= $fetch_products['ID']; ?>" class="option-btn" style=" text-decoration: none;">update</a>
         <a href="admin_products.php?delete=<?= $fetch_products['ID']; ?>" class="delete-btn" onclick="return confirm('delete this product?');"  style=" text-decoration: none;">delete</a>
        
      </div>
   </div>
   
   <?php
         }
      }else{
         echo '<p class="empty">no products added yet!</p>';
      }
   ?>
   
   </div>

</section>
<a href="admin_products.php" class="option-btn" style=" text-decoration: none;">Go back</a>
</body>
</html>