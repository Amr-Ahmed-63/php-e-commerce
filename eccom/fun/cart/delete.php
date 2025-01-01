<?php

require "../../../admin/connect.php";

$id = $_GET["id"];

$delete = $connect->query("DELETE FROM cart WHERE product_id=$id");

if($delete){
    header("location:../../cart.php");
}