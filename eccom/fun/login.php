<?php
session_start();

require "../../admin/connect.php";

if(isset($_SESSION["login"])){
    header("location:../index.php");
    exit();
}

$email = $_POST["email"];
$password = $_POST["password"];

$pass_hash = password_hash($password , PASSWORD_DEFAULT);

$num = $connect->query("SELECT * FROM users WHERE email='$email'")->num_rows;
$user_info = $connect->query("SELECT * FROM users WHERE email='$email'")->fetch_assoc();

if($num == 1){
    if(password_verify($password , $pass_hash)){
        $_SESSION["login"] = $user_info;
        header("location:../index.php");
    }else{
        header("location:../login.php?error=this email or password is incorect");
    }
}else{
    header("location:../login.php?error=this email or password is incorect");
}