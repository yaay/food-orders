
<?php   ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="adminPage.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300&display=swap" rel="stylesheet">
    <title>foodOrders</title>
</head>
<body>
     
     <center>
         <div class="main">
             <form action="insert.php"  method='post' enctype="multipart/form-data" >
                 <h2>Admin Panel</h2>
                 <img src="images/logo.png" alt="logo" width='300px' >
                 <br><br>
                 <input type="text" name="productName">
                 <span ><?= arr['sss']  ?></span>
                 <br>
                 <input type="text" name="productPrice">
                 <br>
                 <input type="file" id='file' name="image" style="display:none"  >
                 <label for="file">Upload Image <i class="fa fa-upload"></i></label>
                 <button name="upload"> Product Upload <i class="fa fa-upload"></i> </button>
                 <br><br>
                 <a href="products.php">Display All Products</a>
             </form>
         </div>
     </center>
</body>
</html>