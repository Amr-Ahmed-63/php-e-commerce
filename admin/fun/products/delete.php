<?php

require "../../connect.php";

$id = $_GET["id"];

$image = $connect->query("SELECT img FROM products WHERE id='$id'")->fetch_assoc();

$delete = $connect->query("DELETE FROM `products` WHERE id='$id'");

$implode_img = implode(" ",$image);

$img = explode("+",$implode_img);

if($delete){
    foreach($img as $val){
        unlink("../../images/$val");
    }
    header("location:../../products.php");
}