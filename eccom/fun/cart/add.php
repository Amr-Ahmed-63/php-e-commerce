<?php
session_start();
require "../../../admin/connect.php";

$id = $_GET["id"];

$product = $connect->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();

$userID=$_SESSION["login"]["id"];

$item_count = $connect->query("SELECT count FROM cart WHERE product_id=$id")->num_rows;

// echo($item_count);


if($item_count == 0){
    $item_count +=1;
    $insert = $connect->query("INSERT INTO cart 
    (product_id,user_id,count)
    VALUES
    ('$id','$userID','$item_count')
    ");
    
    if($insert){
        header("location:../../index.php");
    }
}else{
    $item_count +=1;
    $update = $connect->query("UPDATE cart SET count='$item_count' WHERE product_id=$id ");
    if($update){
        header("location:../../index.php");
    }
}
