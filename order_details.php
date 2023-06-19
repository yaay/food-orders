<?php
session_start();

include './db_connection.php';
include './connection_credentials.php';

$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);

// Retrieve the last few orders with the same order date
$lastOrdersQuery = $db->prepare("SELECT o.ID, o.qty, o.orderDate, p.name, p.image, p.price 
                                FROM `restaurant`.`orders` o
                                INNER JOIN `restaurant`.`products` p ON o.productid = p.ID
                                WHERE o.orderDate = (SELECT MAX(orderDate) FROM `restaurant`.`orders`)
                                ORDER BY o.ID DESC");
$lastOrdersQuery->execute();
$lastOrders = $lastOrdersQuery->fetchAll(PDO::FETCH_ASSOC);


// Calculate the total order price
$totalPrice = 0;
foreach ($lastOrders as $order) {
    $totalPrice += $order['price'] * $order['qty'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Last Orders</title>
    <link rel="stylesheet" href="./css_bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./css_bootstrap/bootstrap.css">
</head>

<body>

    <div class="container">
        <h1>Your Order Details</h1>
        <hr>

        <?php if ($lastOrders) : ?>
            <?php foreach ($lastOrders as $order) : ?>
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="uploaded_img/<?php echo $order['image']; ?>" class="img-fluid rounded-start" alt="<?php echo $order['name']; ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $order['name']; ?></h5>
                                <p class="card-text">Quantity: <?php echo $order['qty']; ?></p>
                                <p class="card-text">Price: <?php echo ($order['price'] * $order['qty']); ?></p>
                                <p class="card-text">Order Date: <?php echo $order['orderDate']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row g-0">
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Total Order Price:</h5>
                            <p class="card-text"><?php echo $totalPrice; ?></p>
                        </div>
                    </div>
                </div>
            </div>

        <?php else : ?>
            <p>No orders found.</p>
        <?php endif; ?>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>