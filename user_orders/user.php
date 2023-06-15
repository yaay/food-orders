<?php
session_start();

include '../db_connection.php';
include '../connection_credentials.php';

$username = $_SESSION["username"];

$db = connect_to_database($db_user, $db_password, $db_name, $db_host, $db_port);

$products = $db->prepare("SELECT * FROM `restaurant`.`products`");
$products->execute();

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="../css_bootstrap/bootstrap.min.css">
	<link rel="stylesheet" href="../css_bootstrap/bootstrap.css">
</head>

<body>


	<nav class="navbar navbar-expand-lg navbar-light bg-light">
		<div class="container-fluid">
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link active" aria-current="page" href="#">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Products</a>
					</li>
				</ul>
				<form class="d-flex">
					<a href="logout.php" class="btn btn-danger" style=" text-decoration: none; font-weight: bold;  text-align: center; border: 3px solid black;">Logout</a>
					&nbsp;&nbsp;
					<img src="./images/social.jpg" style="width: 50px; height:50px; border-radius:5px;">&nbsp;&nbsp;&nbsp;
					<h6 style="margin-top:15px;"><?php echo $username ?></h6>
				</form>
			</div>
		</div>
	</nav>

	<br>
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-9">
				<div class="card-group">
					<div class="row">
						<?php while ($product = $products->fetch(PDO::FETCH_ASSOC)) : ?>
							<div class="card mx-1 col-3 rounded">
								<div class="card-title"><?= $product["name"] ?></div>
								<div class="card-body">
									<img src="uploaded_img/<?= $product["image"] ?>" width="100" alt="">
									<div class="mt-2 text-center">
										<p>Price: <?= $product["price"] ?></p> 
										<button style="z-index:1212" data-id="<?= $product["ID"] ?>" data-name="<?= $product["name"] ?>" class="btn btn-primary btn-sm add-btn px-5 py-2">Add</button>
									</div>
								</div>

							</div>
						<?php endwhile ?>
					</div>
				</div>
			</div>
			<div class="col-6 col-md-3">
				<div style="border: 1px solid black; padding:10px; border-radius:7px;">

					<form action="make_order.php" method="post">
						<div class="text-center fw-bold mb-3">Order Summary</div>

						<div id="orderd-products-injection-point"></div>
						<div class="text-center mt-3">
							<button class="btn btn-primary py-2 px-4">Order</button>
						</div>
					</form>


				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

	<script>
		const addBtns = document.querySelectorAll(".add-btn");
		const orderProduct = document.getElementById("orderd-products-injection-point");


		const orderProductHtml = (productId, productName) => {
			return `
						<div class="row" id="${productName}-${productId}">
							<div class="col-6">
								<p class="mt-2">${productName} <soan class="mx-2 item-count text-danger">1</span></p>
								<input type="hidden" name="orders[${productId}]" value="1">
								
							</div>
							<div class="col-6">
								<button type="button" class="btn increament btn-primary">+</button>
								<button type="button" class="btn decreament btn-warning">-</button>
							</div>
						</div>
			`;
		}

		orderProduct.addEventListener("click", event => {

			if (event.target && event.target.matches(".increament")) {

				let count = Number(event.target.parentElement.parentElement.querySelector(".item-count").innerHTML);

				event.target.parentElement.parentElement.querySelector(".item-count").innerHTML = count + 1;
				event.target.parentElement.parentElement.querySelector("input").value = count + 1;
			}

			if (event.target && event.target.matches(".decreament")) {

				let count = Number(event.target.parentElement.parentElement.querySelector(".item-count").innerHTML);

				event.target.parentElement.parentElement.querySelector(".item-count").innerHTML = count - 1;
				event.target.parentElement.parentElement.querySelector("input").value = count - 1;

				if (count - 1 == 0) {
					event.target.parentElement.parentElement.remove();
				};

			}

		})


		addBtns.forEach(btn => {
			btn.addEventListener("click", event => {

				if (!document.getElementById(event.target.dataset.name + "-" + event.target.dataset.id)) {
					orderProduct.insertAdjacentHTML("beforeend", orderProductHtml(event.target.dataset.id, event.target.dataset.name));
				}
			})
		})
	</script>


</body>

</html>