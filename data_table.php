<?php
include_once('./navbar.php');
include ('./operations.php');

$rows = select();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Table</title>
</head>
<body>
<br>
<div class="container">
    <a href="./create_user.php" style="float: right;" class="btn btn-outline-success">Add New User</a>
    <br>
    <br>
    <table class="table  my-3 table-striped table-hover table-bordered" style="text-align: center;">
        <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Room No.</th>
        <th>Ext</th>
        <th>Profile Picture</th>
        <th>Is Admin</th>
        <th>Edit</th>
        <th>Delete</th>
</tr>

    <?php
    foreach($rows as $row) {
        echo "<tr>";
        foreach($row as $cell) {
            echo "<td> $cell </td>";
        }
        echo "<td> <a href ='./edit_user.php?id={$row["ID"]}' class='btn btn-warning'>Edit</a> </td> <td> <a href ='./delete_user.php?id={$row["ID"]}' class='btn btn-danger'>Delete</a> </td>";
        
        echo "</tr>";
    }
?>
    </table>
</div>

</body>
</html>
