<?php


	require_once "../partials/header.php";

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
		<?php
		//retreive all the products in products.json as a string

		// var_dump(file_get_contents('../assets/lib/products.json'));
		$productsJ = file_get_contents('../assets/lib/products.json');
		//convert to assoc array
		$products = json_decode($productsJ,true);
		//var_dump the array
		// var_dump($products);

		foreach ($products as $product) {
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

			</div>
		
		</div>

		<?php		} ?>
	

	</div>
			

</div>


<?php
	include "../partials/footer.php";
?>
