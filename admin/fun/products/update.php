<?php

require "../../connect.php";

$id = $_POST["id"];
$name = $_POST["name"];
$price = $_POST["price"];
$sale = $_POST["sale"];
$category = $_POST["category"];
$img = $_FILES["img"]["name"];

$old_img = $connect->query("SELECT img FROM products WHERE id='$id'")->fetch_assoc();

// $select_img = explode("+" , $img);

if(empty($img[0])){
    $update = $connect->query("UPDATE products SET
    name='$name',
    price='$price',
    sale='$sale',
    category='$category' 
    WHERE id='$id'
    ");
    if($update){
        header("location:../../products.php");
    }
}else{
    foreach($img as $key => $val){
        if($_FILES["img"]["error"][$key]==0){
            $ex = pathinfo($img[$key] , PATHINFO_EXTENSION);
            $ex_name = [ "jpg" , "png" , "jfif" , "gif" ];
            if(in_array($ex , $ex_name)){
                $new_name = md5(uniqid()).".".$ex;
                $all_img[] = $new_name; 
    
                move_uploaded_file($_FILES["img"]["tmp_name"][$key] , "../../images/".$new_name);
            }
        }
    }
    $result = implode("+",$all_img);
    $up = $connect->query("UPDATE products SET
    name='$name',
    price='$price',
    sale='$sale',
    category='$category',
    img='$result' 
    WHERE id='$id'
    ");
    if($up){
        foreach($old_img as $val){
            unlink("../../images/$val");
        }
        header("location:../../products.php");
    }
}