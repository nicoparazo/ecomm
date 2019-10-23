<?php

// var_dump($_GET['sort']);

session_start();
if(isset($_GET['sort'])){
	if($_GET['sort']=="asc"){
		$_SESSION['sort']= " ORDER BY price ASC";
	} else {
		$_SESSION['sort'] = " ORDER BY price DESC";
	}
}

//HTTP_REFERER is the page that ca;;ed this file
header('Location: '.$_SERVER['HTTP_REFERER']);

var_dump(session_start())



?>
