<?php

require "../../connect.php";

$id = $_GET["id"];

$mes = $connect->query("SELECT * FROM messages WHERE id=$id")->fetch_assoc();

$new_status = 1;

if($mes["status"] == 0){
    $update = $connect->query("UPDATE messages SET `status`='$new_status' WHERE id=$id");
    if($update){
        header("location:../../messages.php");
    }
}else{
    header("location:../../messages.php");
}