<?php

	// var_dump($_POST);
	// var_dump($_POST['email']);
	// var_dump($_POST['password']);


	$email=htmlspecialchars($_POST['email']);
	$password=sha1(htmlspecialchars($_POST['password']));

	// var_dump($email);
	// var_dump($password);

	//retreive the contents of accounts.json as a string

	$json = file_get_contents('../assets/lib/accounts.json');
	// var_dump($json);

	//convert it to php assoc array

	$accounts =json_decode($json, true);
	// var_dump($accounts);


	$flag =false;

	foreach($accounts as $account) {
		// var_dump($account['email']);
		// var_dump($account['password']);
	

		if($account['email']==$email && $account['password']==$password) {
			// var_dump($account);
			
			// //as we've discussed, databases are ideal for permanently storing data that an application can retreive later.
			// There are also options for storing data temporarily in PHP, and one of theose is SESSIONS. Sessions are 
			// designed to hold smaller chunks of data that are normally found in the database (eg current user's email/details)

			// //superglobal variables $_SESSION is a special form of "continuity used to store data across different page requests
			// as user navigates during their visit in our website. The data of the sessoin is stored in the webserver of our website 
			// and can be retreived from the session we initiate at the beginning of each page

			//how to create a session
			//initially we have to tell PHP that we want to start/initialize a session by declaring the session_start function.

			session_start();

			//once a session is initialized, you can create properties
			//or the more correct term, session variables to your $_SESSION and assign values to it
			//syntax: $_SESSION['session_variable']=value

			$_SESSION['email'] = $email;
			$_SESSION['first'] = $account['firstName'];
			var_dump($_SESSION['first']);


			$flag = true;
		} 

	}

	if($flag) {
		echo 'Login Successful';
		header ('Location:../views/gallery.php');
	} else {
		echo 'Wrong Credentials';
	}

?>