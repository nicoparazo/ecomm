<?php

	
	// var_dump($item_id);


	
	session_start();

	$item_id = $_POST['item_id'];

	unset($_SESSION['cart'][$item_id]);
	header("Location: ".$_SERVER["HTTP_REFERER"]);

?>