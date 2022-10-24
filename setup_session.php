<?php
session_start();
include "db_connect.php";
$sql = "SELECT case_id, case_price FROM shop.case1";
if(!$result = mysqli_query($conn, $sql)) {
	echo "Something went wrong when fetching product info: " . mysqli_error($conn);
}
if(!isset($_SESSION["cart"])){
    $_SESSION['cart'] = array();
    for($i = 0; $i < $result->num_rows; $i++){
	    $row = $result->fetch_assoc();
	    array_push($_SESSION['cart'], 0);
	}
}
?>