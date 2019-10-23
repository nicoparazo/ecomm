<?php

require_once './connection.php';

	// var_dump($_POST);

	//sanitize form inputs

	var_dump($_POST);
	$id=$_POST['id'];
	$productName = htmlspecialchars($_POST['item-name']);
	$price = htmlspecialchars($_POST['item_price']);
	$desc =  htmlspecialchars($_POST['description']);
	
	$editedname_query = "UPDATE items SET name='$productName' WHERE id='$id';";
	$editedprice_query = "UPDATE items SET price='$price' WHERE id='$id';";
	$editeddesc_query = "UPDATE items SET description='$productName' WHERE id='$id';";

	$name_result = mysqli_query($conn, $editedname_query);
	$price_result = mysqli_query($conn, $editedprice_query);
	$desc_result = mysqli_query($conn, $editeddesc_query);


	if($name_result && $price_result && $desc_result){
		echo 'addded successfuly';
		header ('Location:../views/gallery.php');
	} else{
		echo mysqli_error($conn);
	}

?>