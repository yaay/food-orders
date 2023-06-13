<?php

include "navbar.php";
include './db_connection.php';
include './connection_credentials.php';
$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);
// admin insert item product ////////////////////////////////////////////////////////
if (isset($_POST['add_product'])) {

   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $price = $_POST['price'];
   $price = filter_var($price, FILTER_SANITIZE_STRING);

   $image = $_FILES['image']['name'];
   $image = filter_var($image, FILTER_SANITIZE_STRING);
   $image_size = $_FILES['image']['size'];
   $image_tmp_name = $_FILES['image']['tmp_name'];
   $image_folder = 'uploaded_img/' . $image;

   $select_product = $db->prepare("SELECT * FROM `restaurant`.`products` WHERE name = ?");
   $select_product->execute([$name]);

   if ($select_product->rowCount() > 0) {
      $message[] = 'product name already exist!';
   } else {
      if ($image_size > 2000000) {
         $message[] = 'image size is too large!';
      } else {
         $insert_product = $db->prepare("INSERT INTO  `restaurant`.`products`(name, price, image) VALUES(?,?,?)");
         $insert_product->execute([$name, $price, $image]);
         move_uploaded_file($image_tmp_name, $image_folder);
         $message[] = 'new product added!';
      }
   }
}
// admin delete product item ///////////////////////////////////////////////////////
if (isset($_GET['delete'])) {

   $delete_id = $_GET['delete'];
   $delete_product_image = $db->prepare("SELECT image FROM `restaurant`.`products` WHERE id = ?");
   $delete_product_image->execute([$delete_id]);
   $fetch_delete_image = $delete_product_image->fetch(PDO::FETCH_ASSOC);
   unlink('uploaded_img/' . $fetch_delete_image['image']);
   $delete_product = $db->prepare("DELETE FROM `restaurant`.`products` WHERE id = ?");
   $delete_product->execute([$delete_id]);
   //  $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE pid = ?");
   //  $delete_cart->execute([$delete_id]);
   header('location:admin_products.php');
}
// admin update product item /////////////////////////////////////////////////////// 
?>


<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> -->
   <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> -->
   <link rel="stylesheet" href="css/admin_product.css">
   <title>admin login</title>
</head>

<body>

   <center>
      <div class="main">
         <form action="" method='post' enctype="multipart/form-data">

            <h2>Add Product</h2>
            <img src="images/logo.png" alt="logo" width='300px'>
            <br><br>
            <input id="nname" type="text" required maxlength="100" placeholder="enter product name" name="name">
            <br>
            <input id="pprice" type="number" required placeholder="enter product price" name="price" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;">
            <br>

            <input type="file" id='file' name="image" style="display:none">

            <label class='label' for="file">Upload Image <i class="fa fa-upload"></i></label>


            <button class="btnn" name="add_product"> Add Product <i class="fa fa-upload"></i> </button>
            <br>


         </form>
      </div>
   </center>
</body>

</html>