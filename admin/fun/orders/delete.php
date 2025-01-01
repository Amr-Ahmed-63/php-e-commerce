<?php

require "../../connect.php";

$id = $_GET["id"];

$delete = $connect->query("DELETE FROM orders WHERE id = '$id'");

header("location:../../orders.php");