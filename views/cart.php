<?php


	require_once "../partials/header.php";

	function getTitle(){
		return "Cart";

	}



?>




<div class="container">
	<h2 class="text-center">My Cart</h2>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<div class="table-responsive">
				<table class="table table-stiped table-bordered" id="cart-items">
					

					


						

						<thread>
						<tr>
							<th>Item Name</th>
							<th>Image</th>
							<th>Price</th>
							<th>Quantity</th>
							<th>Subtotal</th>
							<th>Action</th>
						</tr>
						</thread>

							<tbody>


						<?php 


					// var_dump(count($_SESSION['cart']));
					
					if (isset($_SESSION['cart']) && count($_SESSION['cart']) !=0) {



						$total = 0;


						foreach ($_SESSION['cart'] as $item_id => $item_quantity) {
						// var_dump($item_id);
						// var_dump($item_quantity);

						$item_query = "SELECT * FROM items WHERE id=$item_id";
						$result = mysqli_query($conn, $item_query);
						$indv_item = mysqli_fetch_assoc($result);

						//convert the assoc aray into set of variables w/ associative array keys as the variable names

						extract($indv_item);

						$subtotal = $price * $item_quantity;
						$total += $subtotal;




						

						?>


							<tr>

								<td><?= $name; ?></td>
								<td>
									<div class="img-gal">
										<img class="img-cart"src="<?= $image; ?>">
										
									</div>
									</td>
								<td><?= $price .' Php'; ?></td>
								<td>
									<form action="../controllers/update_cart.php" method="POST">
										<input type="number" name="item_quantity" class="quantityInput" value="<?= $item_quantity; ?>" >
										
										<!-- this is for updating the quantity in the cart -->

										<input type="hidden" name="item_id" value="<?= $id; ?>">
										<input type="hidden" name="updateFromCart" value="true">
										<button class="btn btn-primary">Update quantity</button>


									</form>



								</td>
								<td><?= number_format($subtotal,2).' Php'; ?></td>
								<td>
									<form action="../controllers/remove_item.php" method="POST">
									<input type="hidden" name="item_id" value=
									<?php echo $item_id; ?>>

									
									<button class="btn-danger btn btn-block">Remove From Cart</button>
								</td>
									
							</tr>
							<?php 

						}

							?>
							<tr>
								<td></td>
								<td></td>
								<td>Total: <?= number_format($total,2) .' Php'; ?> </td>
								<td><a href="../controllers/checkout.php" class="btn btn-primary btn-block">Check Out</a>
								</td>

								<td><a href="../controllers/empty_cart.php" class="btn btn-outline-danger btn-block">Empty Cart</a>
								</td>
							</tr>
					<?php
						} else {

						 echo "


						 		<tr>
						 			<td class='text-center' colspan='6'> No items in the cart 
						 			</td>
						 		</tr>";

					}

					?>
						
					</tbody>
				</table>
			</div>
		</div>
</div>

