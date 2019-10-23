<?php


	require_once "../partials/header.php";

	function getTitle(){
		return "Add Product Page";

	}

?>

<div class="main container-fluid">
	<h2 class="text-center">Add New Product</h2>
	<div class="row">
		<div class="col-md-8 mx-auto">
			<form action="../controllers/add_item.php" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="productName">Product Name</label>
					<input type="text" id="productName" class="form-control" name="productName">
				</div>




				<div class="form-group">
					<label for="price">Price</label>
					<input type="number" id="price" class="form-control" name="price">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<input type="text" id="description" class="form-control" name="description">
				</div>

				


				<div class="form-group">
					<label for="image">Image</label>
					<input type="file" id="image" class="form-control" name="image">
				</div>

				<button type="submit" class="btn btn-block btn-secondary">Add Product</button>
			</form>
		</div>
	</div>





<?php
	include "../partials/footer.php";
?>

