
<?php

	//the require statements is the same as the include statement in the sense that it allows devs to reference files from a
	//different location. the only difference is the error handling.
	//include will throw a warning but still execute the code while require will throw a fatal error. include_once and
	//require_once does that same thing but once the file 
	//is included/required already, it will not execute again


	require_once "../partials/header.php";
	require_once "../partials/header.php";

	function getTitle(){
		return "Register Page";

	}
?>

 	
 	<div class="main container-fluid">
 		<h2 class="text-center">Registration Page</h2>
 		<div class="row">
 			<div class="col-md-8 mx-auto"><!-- 
 				the action  attribute sets the destination to which the form data is submitted. The value
 				to which the form data is submitted. The value of this can be an absolute or relative url -->

 				<!-- the method attribute specifies the type of HTTP request you ewant to make when sending the form data -->


 				<form action="../controllers/register_user.php" method="POST">
 					<div class="form-group">
 						<label for="fname">First Name</label>
 						<input type="text" id="fname" name="firstName" class="form-control">
 					</div>
 					<div class="form-group">
 						<label for="lname">Last Name</label>
 						<input type="text" id="fname" name="lastName" class="form-control">
 					</div>
 					<div class="form-group">
 						<label for="email">Email</label>
 						<input type="text" id="email" name="email" class="form-control">
 					</div>
 					<div class="form-group">
 						<label for="password">Password</label>
 						<input type="password" id="password" name="password" class="form-control">
 					</div>
 					<div class="form-group">
 						<label for="confirm">Password</label>
 						<input type="password" id="confirm" name="confirmPassword" class="form-control">
 					</div>

 					<button type="submit" class="btn btn-block btn-secondary">Register</button>



 				</form>

 			</div>
 		</div>
 	</div>

<?php
	include "../partials/footer.php";
?>
