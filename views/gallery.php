<?php


	require_once "../partials/header.php";

	// session_start();

	function getTitle(){
		return "Gallery Page";

	}

	//In order for us to access the stored data in the $_SESSION across different pages, we 
	//just initialize the session with the sessoin start function
	//syntax: session_start()

	//once we have initialized the session. we can then freely access all the session variables and
	//its values stored in the cureent $_SESSION and use it as we please

	//if($_SESSION['email'] == "admin@email.com"]) {
		//echo "Hello Admin"
		// }





?>

<div class="main container">
	<h2 class="text-center">Products Dashboard</h2>
	<div class="row">
		<div class="col-md-12 text-center">
		<h2>Sort By: </h2>
		<ul class="list-group border">
				<li class="list-group-item">
					<a href="../controllers/sort.php?sort=asc">
						Price(Lowest to Highest)
					</a>
				</li>
				<li class="list-group-item">
					<a href="../controllers/sort.php?sort=desc">
						price(Highest to Lowest)
					</a>
				</li>

			</ul>

		</div>
		<?php
		//retreive all the products in products.json as a string

		// // var_dump(file_get_contents('../assets/lib/products.json'));
		// $productsJ = file_get_contents('../assets/lib/products.json');
		// //convert to assoc array
		// $products = json_decode($productsJ,true);
		// //var_dump the array
		// var_dump($products);


		// extracting infromation from the connected database
		$product_query = "SELECT * FROM items";

		// var_dump($_SESSION['sort']);
		// var_dump($product_query);


		//sorting

		if(isset($_SESSION['sort'])) {
			//order by price ASC
			$product_query .= $_SESSION['sort'];
		}


		//mysqli_query() performs a query to our db that returns //true or fals
		//syntax: mysqli_query(connection, query to execute)
		$products_array =mysqli_query($conn, $product_query);
		// var_dump($products_array);



		foreach ($products_array as $product) {
			// var_dump($product);
			
		?>			

	

		<div class="col-md-4">
			<div class="card">
				<img  class="img-gal" src="<?= $product['image']; ?>" class="card-body">

				<div class="card-body">
					<h5 class="card-title"><?= $product['name']; ?> </h5>
					<p class="card-text"><?= $product['price']; ?></p>
					<p class="card-text"><?= $product['description']; ?></p>
				</div>

				<div class="card-footer">
					<form action="../controllers/update_cart.php" method="POST">
						<input type="number" class="form-control" min="1" value="1" name="item_quantity">
						<input type="hidden" name="item_id" value=<?= $product['id']; ?> >
						<button class="btn-secondary btn btn-block add-to-cart">Add To Cart</button>

					</form>

					 
				<?php

					if(isset($_SESSION['user']['role_id'])) {
			//order by price ASC
						
						$usercheck = $_SESSION['user']['role_id'];
						if ($usercheck =='1') {

					 	?>
						<a
						href="../controllers/delete_item.php?id=<?php echo $product['id'] ?>" 
						class="btn btn-danger btn-block">
						Delete Item
						</a>

						<a 

						href="./edit_form.php?id=<?php echo $product['id']?>"
						class="btn btn-primary btn-block">
						Edit Item
						</a>
					

					<?php
		

						} else {


					
						} 

						// echo 'no';
					}

					// var_dump($usercheck);

					?>
				

					

				</div>
			</div>
		
		</div>

		<?php		

	} ?>
	

	</div>
			

</div>


<?php
	include "../partials/footer.php";
?>
