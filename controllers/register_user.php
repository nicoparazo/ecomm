<?php

	//PHP has predefined variables which are designed to collect data sent by HTML forms $_POSR and $_GET
	// superglobal variables simply means that it is a specially pre-defined variable (normally arrays) that can
	//be accessed in the program.

	//the request returned an array where it established the name attribute of the input as the key and the value inputted to it as its value
	

	// var_dump($_POST);
	// var_dump($_POST[firstName]);

	//var_dump($_GET);

	//they ($_POST and $_GET) do the same thing as both variables handle html form data but the main difference is when
	// you use the GET method, the quey string we entered in the form will be displayed in the URL. POST, on the other hand,
	//sends forms behind the scenes thus, not seeing the form data in the URL.


	//sanitize our inputs
	$fname=htmlspecialchars($_POST['firstName']);
	$lname=htmlspecialchars($_POST['lastName']);
	$email=htmlspecialchars($_POST['email']);
	$password=htmlspecialchars($_POST['password']);
	$confirmPassword=htmlspecialchars($_POST['confirmPassword']);

	//check values of the variables that we used to store the user credentials
	// var_dump($fname);
	// var_dump($lname);
	// var_dump($email);
	// var_dump($password);
	// var_dump($confirmPassword);

	if($fname !="" && $lname !="") {
		echo "<br>Welcome ".$fname." " .$lname;

	} else {
		echo "<br>Please provide a complete name";
	}

	if ($email !="") {
		echo "<br>Your email is: ".$email;
	} elseif (strpos($email, '@') && strpos($email, '.')) {
		// echo "Valid Email";
	} else {
		echo "<br>Please check your email";
	}



	if($password !="" || $confirmPassword !="") {
		//lets hash our password to make it secure
		$password = sha1($password);
		$confirmPassword =sha1($confirmPassword);
		// var_dump($password);
		// var_dump($confirmPassword);

		//check if $password is equal to $confirm password

		if($password === $confirmPassword) {
			echo "<br>passwords match";

			//retrieve the contents of accounts.json
			//file_get_contents() will return the content in a string
			// file_get_contents(filename that we want to extract)

			$json = file_get_contents("../assets/lib/accounts.json");
			// var_dump($json);

			//convert the JSON string to a php associative arrays. when the second parameter
			// is set to true it converts the json string to an assoc array

			$accounts = json_decode($json, true);
			// var_dump($accounts);

			//form a new assoc array using the sanitized inputs
			$newUser =["firstName" => $fname, "lastName" =>$lname, "email" =>$email, "password" => $password];
			// var_dump($newUser);

			//push the content of $newUser to the end of the assoc version of accounts.json()
			//array_push(array,value to be pushed)

			array_push($accounts, $newUser);
			//should reflect newly inserted data ($newUser)
			// var_dump($accounts);

			//fopen() function opens the file for writting
			//fopen(file to be opened, mode of access)
			//mode of access: w  opens the file for writing/manipulating it

			$to_write = fopen('../assets/lib/accounts.json', 'w');

			//fwrite()writes on the opened file
			//fwrite(opened file, string to be written)
			//json_encode() converts the php array to a JSON string
			//json_encode(value, option)
			//JSON_PRETTY_PRINT option adds white spaces that makes JSON 
			//strings readable

			$x = json_encode($accounts, JSON_PRETTY_PRINT);
			// var_dump($x);

			fwrite($to_write, $x);

			//close the previously open file
			fclose($to_write);

			//redirect the user to views/login

			// header ('Location: ../views/register.php');





		} else {
			echo "<br> passwords did not match";
		}

	} else {
		echo "<br> Please check the password fields";
	}

	
	//we are going to be storing to a JSON file. JSON stands for Javascript Object Notation
	//It is used in exchanging and storing data from the webserver. Json uses
	//the object notation/syntax of Javascript

		
?>