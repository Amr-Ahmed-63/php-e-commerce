<?php

require "../../connect.php";

$id = $_GET["id"];

$delete = $connect->query("DELETE FROM messages WHERE id = '$id'");

header("location:../../messages.php");