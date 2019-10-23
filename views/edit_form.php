
<?php
require_once '../partials/header.php';
require_once '../controllers/connection.php';



function getTitle(){
	return 'Update details';

}


//code starts here

$item_to_be_edited = $_GET['id'];


$item_query = "SELECT name, price, description FROM items WHERE id= '$item_to_be_edited';";



$item_result = mysqli_query($conn, $item_query);





$item_result = mysqli_query($conn, $item_query);





$item = mysqli_fetch_assoc($item_result);
// var_dump($item);

// var_dump($_GET);

?>



<div class="container">
	<h2 class="text-center">Update Item</h2>
	<div class="row">
		<div class="col-md-10 mx-auto">
			<form action="../controllers/update_item.php" method="POST">
				<label for="">Item name:</label>
				<input type="text" name="item-name" class="form-control" value="<?php echo $item['name']; ?>">
				<input type="hidden" name="id" value="<?php echo $item_to_be_edited; ?>">
				<label for="">Item Price: </label>
				<input type="text" name="item_price" class="form-control" value="<?php echo $item['price']; ?>">
				<label for="">Description:</label>
				<textarea type="text" name="description" id="" cols="30" rows="10">
					
					<?php echo $item['description']; ?>

				</textarea>
				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
</div>



<?php

require_once  '../partials/footer.php';


?>

