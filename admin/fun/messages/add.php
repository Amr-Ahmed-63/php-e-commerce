<?php

require "../../connect.php";



$name = $_POST["name"];
$email = $_POST["email"];
$phone = $_POST["phone"];
$message = $_POST["message"];
$status = 0;

$insert = $connect->query("INSERT INTO `messages`(`name`, `email`, `phone`, `message`, `status`) VALUES ('$name','$email','$phone','$message','$status')");

if($insert){
    echo("<div class='alert alert-success'> Your message has been sent successfully </div>");
}