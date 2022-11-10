<?php
include "db_connect.php";
session_start();
$phone_storage= $_POST['phone_mem'];
$phone_type= $_POST['product_type'];
if(isset($_GET['id'])){
    $productid=$_GET['id'];
}

if($phone_type=='phone'){
    $sql ="SELECT * FROM product_detail WHERE product_id=".$productid." AND product_capacity='".$phone_storage."'";
}
else{
    $sql ="SELECT * FROM product_detail WHERE product_id=".$productid;
}


$result = $conn->query($sql);
if($result->num_rows>0){
    $product_detail=$result->fetch_assoc();   
}

if(!isset($_SESSION["cart"])){
    $_SESSION['cart'] = array();
    for($i = 0; $i < 28; $i++){
	    array_push($_SESSION['cart'], 0);
    }   
}

$_SESSION['cart'][$product_detail['id']-1]++;

if($phone_type=='phone'){
    header("location:../IE4717-Design-Project/phone.php");
}
elseif($phone_type=='airpod'){
    header("location:../IE4717-Design-Project/airpod.php");
}
elseif($phone_type=='case'){
    header("location:../IE4717-Design-Project/case.php");
}
else{
    header("location:../IE4717-Design-Project/smartwatch.php");
}

?>
























