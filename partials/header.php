<?php session_start();
	  require_once '../controllers/connection.php';



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../assets/css/style.css">

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

	<title> J eComm | <?php echo getTitle(); ?> </title>

	
</head>
<body>

	<nav class="navbar navbar-expand-lg navbar-dark">
		  <a class="navbar-brand" href="#">JSON eCommerce</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>
		  <div class="collapse navbar-collapse" id="navbarText">
		    <ul class="navbar-nav mr-auto">
		    	<?php

		    if(isset($_SESSION['cart'])) {
		    	$cart_count = count($_SESSION['cart']);

		    } else {
		    	$cart_count = 0;
		    }
		   
		    	//isset() function checks if a variable/element has been assigned a value
		    	//if session email has no assigned value/has not been set.
		    	//else, display the logout button
		    // var_dump($_SESSION['user']);
		    // var_dump($_SESSION['user']['firstname']);//returns the value of the firstname field of the current owner of the $_SESSION['user']
		    // var_dump($_SESSION['user']['email']);
		    // var_dump($_SESSION['user']['password']);

		     if(isset($_SESSION['user']['firstname'])) {

		    	$username = $_SESSION['user']['firstname'];
		    	// var_dump($username);

		    }


		    //issset checks if there is an assigned value for the variable. The confition below
		    //checks if both a $_SESSION['user'] is set and role_id has a value of 1 or admin

		    if(isset($_SESSION['user'])&&($_SESSION['user']['role_id'])==1) {



		    		echo "
		    		 <li class='nav-item active'>
		        		<a class='nav-link' href='./logout.php'>Log Out</a>
		      		</li>

		      		<li class='nav-item px-3'>
		    			<a class='nav-link' href='./gallery.php'>Gallery</a>
		    		</li>

		      		<li class='nav-item active'>
		        		<a class='nav-link' href='./add_product.php'>Add Product</a>
		      		</li>


		      		<li class='nav-item'>
		        		<a class='nav-link' href='#''>Welcome, $username</a>
		      		</li>

		      		<li class='nav-item'>
		      			<a class='nav-link' href='./cart.php'>View Cart: $cart_count 
		      			
		      			</a>
		      		</li>

		      		";

		    } else {

		    	if(!isset($_SESSION['user']['email'])){
		    		echo " 
		    		<li class='nav-item' px-3>
		    			<a class='nav-link' href='./register.php'>Register</a>
		    		</li>

		    		<li class='nav-item px-3'>
		    			<a class='nav-link' href='./login.php'>Login</a>
		    		</li>

		    		<li class='nav-item px-3'>
		    			<a class='nav-link' href='./gallery.php'>Gallery</a>
		    		</li>


		      		<li class='nav-item'>
		        		<a class='nav-link' href='#''>Welcome, Guest!</a>
		      		</li>



		    		";
		    	}  else {

		    		echo "
		    		 <li class='nav-item active'>
		        		<a class='nav-link' href='./logout.php'>Log Out</a>
		      		</li>

		      		<li class='nav-item px-3'>
		    			<a class='nav-link' href='./gallery.php'>Gallery</a>
		    		</li>


		      		<li class='nav-item'>
		        		<a class='nav-link' href='#''>Welcome, $username</a>
		      		</li>

		      	
		      		
		      		<li class='nav-item'>
		      			<a class='nav-link' href='./cart.php'>View Cart: $cart_count 
		      			
		      			</a>
		      		</li>

		      		";
		      		
		    	}




		    }

		   

		    	


		    	

		    	?>

		     
			</ul>
		  
		  </div>
	</nav>		
