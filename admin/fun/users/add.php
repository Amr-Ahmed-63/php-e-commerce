<?php

require "../../connect.php";

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$priv = $_POST["priv"];

$pass_hash = password_hash($password , PASSWORD_DEFAULT);


$select_email = $connect->query("SELECT * FROM users WHERE email='$email'")->num_rows;
$select_password = $connect->query("SELECT * FROM users WHERE password='$pass_hash'")->num_rows;


if ( $select_email == 0 && $select_password == 0) {
    $insert = $connect->query("INSERT INTO users 
    (name,email,password,gender,priv)
    VALUES
    ('$name','$email','$pass_hash','$gender','$priv')");
}else{
    header("location:../../forms/users/add.php?error=this email or password is already taken");
}

if($insert){
    header("location:../../users.php");
}