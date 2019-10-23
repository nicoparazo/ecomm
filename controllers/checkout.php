<?php
session_start();

//when to check out?
// 1. Sure of the items in the cart
//2. user logged in

require_once './connection.php';

var_dump(time());

//this makes sure that the user is logged in
if(isset($_SESSION['user'])) {
	//orders table
	//user id. transaction_code, purchase date, total, status_id, payment_mode_id

	$user_id =$_SESSION['user']['id'];
	$transaction_code = "ePets".time();
	$ptotal = 0; /*update this after we compute the total from the cart table*/
	$status_id = 1; /*default value for pending*/
	$payment_mode_id = 1; /*default value or COD*/

	// var_dump($transaction_code);
	
	$order_query = "INSERT INTO orders(user_id, transaction_code, total, status_id, payment_mode_id) VALUES('$user_id','$transaction_code','$ptotal','$status_id','$payment_mode_id')";

	// var_dump($order_query);
	$order_result = mysqli_query($conn, $order_query); 

	//mysqli_insert_id()  -> Returns the id of the most recent order, recent data on the table
	$order_id = mysqli_insert_id($conn);
	var_dump($order_id);

	//create entries for our item_order table;

	// var_dump($_SESSION ['cart']);

	foreach ($_SESSION['cart'] as $item_id => $quantity) {
		$item_query = "SELECT * FROM items WHERE id = $item_id";
		$item_result = mysqli_query($conn, $item_query);
		$item = mysqli_fetch_assoc($item_result);
		
		$ptotal += $item['price'] * $quantity;

		//insert data to item_order table
		//order_id, item_id & quantity

		$item_orders_query = "INSERT INTO item_orders(item_id,order_id,quantity) VALUES('$item_id','$order_id','$quantity')";

		echo $item_orders_query.";";
		// var_dump($item_orders_query);
		$item_orders_result = mysqli_query($conn, $item_orders_query);
		// var_dump($item_orders_result);
		// echo $item_orders_result;

		// var_dump($order_id);
	}

	//UPDATE orders table to ref;ect the correct total
	//syntax: UPDATE table_name SET column_name = $new_value WHERE column_name = $order_id;

	// $update_total_orders = "UPDATE orders SET total = $ptotal WHERE id=$order_id";

	// $update_total_result = mysqli_query($conn, $update_total_orders);
	// // header("Location: ../views/gallery.php");


}

?>


