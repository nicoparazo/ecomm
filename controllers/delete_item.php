<?php

require_once './connection.php';

$item_id = $_GET['id'];

// var_dump($item_id);

$delete_item_query = "DELETE FROM items WHERE id=$item_id";

var_dump($delete_item_query);

$result = mysqli_query($conn, $delete_item_query);

// header("Location: ".$_SERVER["HTTP_REFERER"]);
// var_dump($result);
?>