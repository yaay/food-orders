<?php 
include('config.php');
// include('adminPage.php');
$name = $_POST['productName'];
$price = $_POST['productPrice'];
$image = $_FILES["image"]['name'] ;
var_dump($image);
if (isset($_POST['upload'])  && !empty($name)  && !empty($price)  && !empty($image)  ) {
   

    $image_location = $_FILES['image']['tmp_name'];
    $image_name = $_FILES['image']['name'];
   
    $image_up = "images/$image_name";
    // var_dump($image_name);
    $insert = "INSERT INTO products(name,price,image) VALUES('$name','$price','$image_up')";
    
   mysqli_query($conn , $insert);
//    if (!$res) {
//    echo  mysqli_error($res);
//    }
    if (move_uploaded_file($image_location,'images/'.$image_name)) {
       echo "<script>alert('success')</script>";
    }else{
        echo "<script>alert('error')</script>";
    }
    // header('location:adminPage.php');
}elseif( empty($name)){
    echo "<script>alert('name is empty')</script>";
    // header('Location:adminPage.php');
    // exit;

}elseif( empty($price)){
    echo "<script>alert('price is empty')</script>";
    // header('Location:adminPage.php');
    // exit;
}elseif( empty($image)){
    echo "<script>alert('please choose image')</script>";
    // header('Location:adminPage.php');
    // exit;
}

?>