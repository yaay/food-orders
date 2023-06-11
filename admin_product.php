<?php 

include "navbar.php";
include './db_connection.php';
include './connection_credentials.php';
$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);

if(isset($_POST['add_product'])){

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $price = $_POST['price'];
    $price = filter_var($price, FILTER_SANITIZE_STRING);
 
    $image = $_FILES['image']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploaded_img/'.$image;
 
    $select_product = $db->prepare("SELECT * FROM `restaurant`.`products` WHERE name = ?");
    $select_product->execute([$name]);
 
    if($select_product->rowCount() > 0){
       $message[] = 'product name already exist!';
    }else{
       if($image_size > 2000000){
          $message[] = 'image size is too large!';
       }else{
          $insert_product = $db->prepare("INSERT INTO  `restaurant`.`products`(name, price, image) VALUES(?,?,?)");
          $insert_product->execute([$name, $price, $image]);
          move_uploaded_file($image_tmp_name, $image_folder);
          $message[] = 'new product added!';
       }
    }
 
 }
?>   


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link rel="stylesheet" href="adminPage.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/admin_product.css">
    <title>admin login</title>
</head>
<body>

     <center>
         <div class="main">
             <form action=""  method='post' enctype="multipart/form-data" >
    
                 <h2>Add Product</h2>
                 <img src="images/logo.png" alt="logo" width='300px' >
                 <br><br>
                 <input type="text" required maxlength="100" placeholder="enter product name" name="name">
                 <br>
                 <input type="text" required placeholder="enter product price" name="price">
                 <br>
                
                 <input type="file" id='file' name="image" style="display:none"  required accept="image/jpg, image/jpeg, image/png">

                 <label for="file">Upload Image <i class="fa fa-upload"></i></label>
                
                 <button name="add_product">  Add Product  <i class="fa fa-upload"></i> </button>
                 <br>
                
              
             </form>
         </div>
     </center>
</body>
</html>
