<?php include "navbar.php";
?> 
<!DOCTYPE html>
<html>
<head>
  <title>Last Restaurant Orders</title>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Latest Checks</h2>
    <table class="table">
      <thead>
        <tr>
          <th>Order ID</th>
          <th>User</th>
          <th>Products</th>
          <th>Order Date</th>
          <th>Quantity</th>
        </tr>
      </thead>
      <tbody>
        <?php
          // Include database connection file
          include './db_connection.php';
          include './connection_credentials.php';
          
          // Connect to the database
          $db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);
          
          // Retrieve last restaurant orders from the database
          $query = "SELECT o.ID, u.name AS userName, p.name AS productName, o.orderDate, o.qty FROM `restaurant`.`orders` o
          INNER JOIN `restaurant`.`users` u ON o.userId = u.ID
          INNER JOIN `restaurant`.`products` p ON o.productid = p.ID
          ORDER BY o.orderDate DESC
          LIMIT 10"; // Adjust the query as per your requirements
          $statement = $db->query($query);

          // Loop through the query results and display the orders
          while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>".$row['ID']."</td>";
            echo "<td>".$row['userName']."</td>";
            echo "<td>".$row['productName']."</td>";
            echo "<td>".$row['orderDate']."</td>";
            echo "<td>".$row['qty']."</td>";
            echo "</tr>";
          }

          // Close the database connection (optional for PDO)
          $db = null;
        ?>
      </tbody>
    </table>
  </div>

  <!-- Include Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
