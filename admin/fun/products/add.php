<?php

require "../../connect.php";

$name = $_POST["name"];
$price = $_POST["price"];
$sale = $_POST["sale"];
$category = $_POST["category"];
$img = $_FILES["img"]["name"];



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


$data = implode("+",$all_img);

$insert = $connect->query("INSERT INTO products 
(name , price , sale , category , img)
VALUES
('$name','$price','$sale','$category','$data')
");

if($insert){
    header("location:../../products.php");
}