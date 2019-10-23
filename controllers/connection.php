<?php 

$host = '127.0.0.1';    //determines the host to use;
$username = 'root'; //user for the host
$password = '';  //password for the host
$db = 'b43_ecom_db'; //database that we need

//open a connection to the mySQL server
//mySQLi_connect(host,user,password, database);

$conn = mysqli_connect($host,$username,$password,$db);

if(!$conn) {

	//mysqli_error() returns a string description of the last error
	//die('message') prints a message and exists the php script
	die('connection failed'.mysqli_error($conn));
}	else {
	// var_dump('successful connection');
}






?>
