<?php

	require_once "../partials/header.php";
	require_once "../partials/header.php";

	function getTitle(){
		return "Log-In Page";

	}
?>

	<div class="main-pane container-fluid">
		<h2 class="text-center">Login Page</h2>

		<div class="row">
			<div class="col-md-8 mx-auto">
					<form action="../controllers/authenticate.php" method="POST">
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" id="email" name="email" class="form-control">
						</div>

						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" id="password" name="password" class="form-control">
						</div>
						<button type="submit" class="btn btn-secondary btn-block">Login</button>
					</form>
			</div>
		</div>
	</div>


<?php
	include "../partials/footer.php";
?>


