<?php

	require_once './connection.php';

	// var_dump($_POST);

	//sanitize form inputs

	$productName = htmlspecialchars($_POST['productName']);
	$price = htmlspecialchars($_POST['price']);
	$desc =  htmlspecialchars($_POST['description']);
	$category_id=1;
	
	//check how superglobal $_FILES look
	//superglobal $_Files in an assoc array that will contain a key equivalent to the name given in our input in the
	// form which has an assoc array of information of the uploaded file as its value
	
	//check how $_FILES['image'] look 
	//['image'] is the value of our name attribute for our input file
	//$_FILES['image'] will return all the details of the uploaded file in our web server
	//syntax $_FILES['name in the form'][property/key]		
	// var_dump($_FILES['image']['name']);

	$filename = $_FILES['image']['name'];
	$filesize = $_FILES['image']['size'];
	$file_tmpname=$_FILES['image']['tmp_name'];

	// var_dump($filename);
	// var_dump($filesize);
	// var_dump($file_tmpname);

	//get the file extension of $filename using the pathinfo() and convert it to lowercase chars.
	//pathinfo() will return an assoc array of information regarding the path and file type of the
	//uploaded file. we are using the PATHINFO_EXTENSION to only return the file extension
	//syntax: pathinfo(file ro be checked, option)




	$file_type= strtolower(pathinfo($filename, PATHINFO_EXTENSION));
	var_dump($file_type);

	$isImg=false;
	$hasDetails = false;

	if ($productName !="" && $price>0 && $desc !="") {
		$hasDetails = true;
		var_dump($hasDetails);
	}

	if ($file_type =="jpg" || $file_type == "png" || $file_type =="jpeg"|| $file_type =="gif" || $file_type =="svg") {
		$isImg = true;
		var_dump($isImg);
	}

	if ($filesize > 0 && $isImg && $hasDetails) {
		echo "ready to upload";
		//declare final path that we want to assign the uploaded file
		$final_filepath ="../assets/images/".$filename;
		// var_dump($final_filepath);
		//move the image that is temporarily stored in our server to the final path
		//syntax: move_uploaded_file(temporary_path, new_path);
		move_uploaded_file($file_tmpname, $final_filepath);

		$newProduct = ["name" => "$productName", "price" => "$price", "description" => "$desc", "image" =>"$final_filepath"];
	// var_dump($newProduct);

	//return contents of products.jsonm 
		// $json = file_get_contents("../assets/lib/products.json");
		// var_dump($json);
		// $allProducts = json_decode($json, true);

		// array_push($allProducts,$newProduct);

		// $to_write = fopen('../assets/lib/products.json', 'w');

		// $y = json_encode($allProducts, JSON_PRETTY_PRINT);

		// fwrite($to_write, $y);

			//close the previously open file
		// fclose($to_write);

		//redirect to gallery page

		// header ('Location:../views/gallery.php');


	} else {
		echo "please upload an image";

	}

	//create a new assoc array containing th product details

	
	$new_item_query = "INSERT INTO items(name,price,description,image,category_id) VALUES('$productName','$price','$desc','$final_filepath','$category_id')";
	// var_dump($new_item_query)";
	$result = mysqli_query($conn, $new_item_query);

	if($result){
		echo 'addded successfuly';
		header ('Location:../views/gallery.php');
	} else{
		echo mysqli_error($conn);
	}


?>