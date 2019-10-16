<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title></title>

	
</head>
<body>
 	<?php

 	//php allows developers to take what used to be statuc HTML content and make it responsive to
 	//user's requests, or do the same with permanently stored data that resides in a database
 	// to serve a project:
 	//php -S address:port
 	//php -S 0.0.0.0:3000

 	echo "hello";
 	//header function will ridect to the indicated path
 	header ('Location: ./views/register.php');

 	?>
	
</body>
</html>