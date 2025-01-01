<?php

require "../../connect.php";

$id = $_POST["id"];
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];
$priv = $_POST["priv"];


if ( $select_email == 0 && $select_password == 0) {
    $update = $connect->query("UPDATE `users` SET `name`='$name',`email`='$email',`gender`='$gender',`priv`='$priv' WHERE id='$id'");
}else{
    header("location:../../forms/users/update.php?error=this email or password is already taken");
}

if($update){
    header("location:../../users.php");
}