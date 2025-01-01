<?php
session_start();
require "../../admin/connect.php";

$user_id = $_SESSION["login"]["id"];

$products = $connect->query("SELECT * FROM cart WHERE user_id = '$user_id'");
$all = [];

foreach($products as $key=> $pro){
    array_push($all,$pro["product_id"]);
}

$products_id = implode("+",$all);

$insert = $connect->query("INSERT INTO orders 
(`user_id`,`products_id`)
VALUES
('$user_id','$products_id')");

if($insert){
    $delete = $connect->query("DELETE FROM cart WHERE user_id='$user_id'");
    if($delete){
        header("location:../index.php");
    }else{
        header("location:../checkout.php");
    }
}else{
    header("location:../checkout.php");
}

