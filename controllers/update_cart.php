<?php
	// var_dump($_POST['item_id']);

	session_start();

	$item_id = $_POST['item_id'];
	$item_quantity = $_POST['item_quantity'];

	var_dump($item_quantity);
	var_dump($item_id);


	// $_SESSION['cart']['property'] =value
	// $_SESSION['cart']['$item_id'] = value  

	// ---> Quanity of the value
	// $_SESSION['cart'][$item_id] = $item_quantity;
	// var_dump($_SESSION['cart']);


	//if updates came from the cart page

	if(isset($_POST['updateFromCart'])) {

		//item id and new item quantity from the update quantity form
		$_SESSION['cart'][$item_id] = $item_quantity;
		header("Location: ".$_SERVER["HTTP_REFERER"]);


	} else {


		if(isset($_SESSION['cart'][$item_id])) {
		//will run if a value is already assigned for this item
		$_SESSION['cart'][$item_id] += $item_quantity;
		// echo 'if';
		// var_dump('new item '.$item_quantity);
		header("Location: ".$_SERVER["HTTP_REFERER"]);
		} else {

		$_SESSION['cart'][$item_id] = $item_quantity;
		header("Location: ".$_SERVER["HTTP_REFERER"]);

		}

	}

	// 	//will run if no quantity has been assigned for this item
	// 	$_SESSION['cart'][$item_id] = $item_quantity;
	// 	// echo 'else';
	// 	header("Location: ".$_SERVER["HTTP_REFERER"]);
	// }
header("Location: ".$_SERVER["HTTP_REFERER"]);

// var_dump($_SESSION['cart']);
?>